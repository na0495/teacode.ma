<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    
    public function contributors(Request $request)
    {
        $data = new \stdClass;
        $data->contributors = json_decode(\File::get(base_path() . '/database/data/contributors.json'));
        $data->socialLinks = json_decode(\File::get(base_path() . '/database/data/social-links.json'));
        $data->menuFooter = json_decode(\File::get(base_path() . '/database/data/menu-footer.json'));
        $title = 'TeaCode | Contributors';
        
        $client = new \GuzzleHttp\Client();
        $url = 'https://randomuser.me/api/?results=' . count($data->contributors);
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody())->results;
        // dd($responseBody[0]->picture);
        
        // dump($data->contributors[0]->image);
        $data->contributors = collect($data->contributors)->map(function ($contributor, $key) use ($responseBody) {
            $contributor->image = $responseBody[$key]->picture->medium;
            return $contributor;
        })->values();
        // dd($data->contributors[0]->image);
        
        return view('pages.contributors', ['data' => $data, 'title' => $title]);
    }
    
    public function resources(Request $request)
    {
        $data = new \stdClass;
        $data->resources = json_decode(\File::get(base_path() . '/database/data/resources.json'));
        $data->socialLinks = json_decode(\File::get(base_path() . '/database/data/social-links.json'));
        $data->menuFooter = json_decode(\File::get(base_path() . '/database/data/menu-footer.json'));
        $title = 'TeaCode | Resources';
        return view('pages.resources', ['data' => $data, 'title' => $title]);
    }

    public function privacy(Request $request)
    {
        $data = new \stdClass;
        $data->socialLinks = json_decode(\File::get(base_path() . '/database/data/social-links.json'));
        $data->menuFooter = json_decode(\File::get(base_path() . '/database/data/menu-footer.json'));
        $title = 'TeaCode | Privacy Policy';
        return view('pages.privacy', ['data' => $data, 'title' => $title]);
    }

    public function terms(Request $request)
    {
        $data = new \stdClass;
        $data->socialLinks = json_decode(\File::get(base_path() . '/database/data/social-links.json'));
        $data->menuFooter = json_decode(\File::get(base_path() . '/database/data/menu-footer.json'));
        $title = 'TeaCode | Terms of Use';
        return view('pages.terms', ['data' => $data, 'title' => $title]);
    }

}
