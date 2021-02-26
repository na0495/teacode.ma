<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class HomeController extends Controller
{
    public function home(Request $request, $var = null)
    {
        $baseUrl = $request->getBaseUrl();
		if (strpos($baseUrl, 'public') != false || strpos($baseUrl, 'base') != false) {
			return \Redirect::to('https://teacode.ma');
		}
        if ($var) {
            return redirect('/');
        }
        $data = new stdClass;
        $data->activities = json_decode(\File::get(base_path() . '/database/data/activities.json'));
        $data->socialLinks = json_decode(\File::get(base_path() . '/database/data/social-links.json'));
        $title = 'TeaCode | Turning Tea into Code';
        return view('pages.index', ['data' => $data, 'title' => $title]);
    }

    public function privacy(Request $request)
    {
        $data = new stdClass;
        $data->socialLinks = json_decode(\File::get(base_path() . '/database/data/social-links.json'));
        $title = 'TeaCode | Privacy Policy';
        return view('pages.privacy', ['data' => $data, 'title' => $title]);
    }

    public function terms(Request $request)
    {
        $data = new stdClass;
        $data->socialLinks = json_decode(\File::get(base_path() . '/database/data/social-links.json'));
        $title = 'TeaCode | Terms of Use';
        return view('pages.terms', ['data' => $data, 'title' => $title]);
    }

    public function sitemap(Request $request)
    {
        $filePath = public_path() . '\storage\sitemap.xml';
        $filename = 'sitemap.xml';
        return \Response::make(file_get_contents($filePath), 200, [
            'Content-Type' => 'application/xml',
            'Content-Disposition' => 'inline; filename="'.$filename.'"',
            // 'Content-Transfer-Encoding'=> 'binary',
            // 'Accept-Ranges'=> 'bytes'
        ]);
    }

    public function generateSitemap(Request $request)
    {
        $path = public_path('/sitemap.xml');
        \Spatie\Sitemap\SitemapGenerator::create('https://teacode.ma')->writeToFile($path);
        return response(['path' => $path], 200);
    }
}
