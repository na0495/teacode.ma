<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(Request $request, $videoId = null)
    {
        $data = new \stdClass;
        $data->socialLinks = json_decode(\File::get(base_path() . '/database/data/social-links.json'));
        $data->menuFooter = json_decode(\File::get(base_path() . '/database/data/menu-footer.json'));
        $title = 'TeaCode | Videos';
        
        $params = [
            'type' => 'video',
            'part' => 'id, snippet, contentDetails',
            'maxResults' => 50,
            'length' => true
        ];
        // $channel = \Youtube::getChannelById('UCss61diIS1kW_TRsHMMwtwQ');
        // $playlist = \Youtube::getPlaylistById('UUss61diIS1kW_TRsHMMwtwQ');
        $playlistItems = \Youtube::getPlaylistItemsByPlaylistId('UUss61diIS1kW_TRsHMMwtwQ', $params);
    
        $results = $playlistItems['results'];
        $results = collect($results);
        // dump($results[0]);
        $results = $results->map(function ($result) {
            $videoData = \Youtube::getVideoInfo($result->snippet->resourceId->videoId);
            $duration = $videoData->contentDetails->duration;
            $duration = str_replace(['PT','H','M','S'], ['',':',':',''], $duration);
            $duration = trim($duration, ':');
            $tmp = explode(':', $duration);
            array_walk($tmp, function (&$value) {
                $value = $value > 9 ? $value : '0'.$value;
            });
            $duration = implode(':', $tmp);
            
            $publishedAt = str_replace(['T','Z'], [' ',''], $result->snippet->publishedAt);
            $diffForHumans = Carbon::createFromFormat('Y-m-d H:i:s', $publishedAt)->diffForHumans();
            $date = Carbon::createFromFormat('Y-m-d H:i:s', $publishedAt)->format('M d, Y');

            $data = (object) [
                'videoTitle' => $result->snippet->title, 
                'videoId' => $result->snippet->resourceId->videoId,
                'videoDuration' => $duration,
                'description' => $videoData->snippet->description,
                'publishedAt'=> $date,
                'cover' => (object) [
                    'standard' => $result->snippet->thumbnails->standard,
                    'medium' => $result->snippet->thumbnails->medium,
                    'maxres' => $result->snippet->thumbnails->maxres
                ]
            ];
            return $data;
        });

        $data->results = $results;
        $videoId = $videoId ?? $data->results[0]->videoId;
        $currentVideoData = \Youtube::getVideoInfo($videoId);
        $data->currentVideo = (object) [
            'id' => $videoId,
            'description' => $currentVideoData->snippet->description,
            'params' => [
                // 'controls=0',
                'rel=0',
                // 'autoplay=1',
                // 'modestbranding=1',
                'color=yellow',
            ]
        ];
        $data->currentVideo->params = implode($data->currentVideo->params, '&');
        
        return view('pages.api.youtube.index', ['data' => $data, 'title' => $title]);
    }
}
