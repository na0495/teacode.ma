<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class HomeController extends Controller
{
    private $home = '/';

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
        $data->menuFooter = json_decode(\File::get(base_path() . '/database/data/menu-footer.json'));
        $title = 'TeaCode | Turning Tea into Code';
        return view('pages.index', ['data' => $data, 'title' => $title]);
    }

    public function resources(Request $request)
    {
        $data = new stdClass;
        $data->resources = json_decode(\File::get(base_path() . '/database/data/resources.json'));
        $data->socialLinks = json_decode(\File::get(base_path() . '/database/data/social-links.json'));
        $data->menuFooter = json_decode(\File::get(base_path() . '/database/data/menu-footer.json'));
        $title = 'TeaCode | Resources';
        return view('pages.resources', ['data' => $data, 'title' => $title]);
    }

    public function gotoExternalLink(Request $request, $link)
    {
        $links = [

            'discord' => 'https://discord.gg/vKu2fkPqjY',

            'workshops' => 'https://discord.gg/acVUjZ74PU',
            'communication' => 'https://discord.gg/rSeFZZvjDY',
            'communication-en' => 'https://discord.gg/rSeFZZvjDY',
            'communication-fr' => 'https://discord.gg/RTycrq2Hfk',
            'hangouts' => 'https://discord.gg/cC7kuBqJsy',
            'pair-programming' => 'https://discord.gg/7d3mDvVFvs',
            'mock-interview' => 'https://discord.gg/F5rBCKj2ah',

            'facebook-page' => 'https://facebook.com/teacode.ma',
            'facebook-group' => 'https://facebook.com/groups/teacode.ma',
            'linkedin' => 'https://www.linkedin.com/company/teacodema',
            'youtube' => 'https://youtube.com/channel/UCss61diIS1kW_TRsHMMwtwQ',
            'twitter' => 'https://twitter.com/teacodema',
            'instagram' => 'https://instagram.com/teacode.ma',
        ];
        $url = $this->home;
        if ($link && array_key_exists($link, $links)) {
            $url = $links[$link];
        }
        return redirect($url);
    }

    public function privacy(Request $request)
    {
        $data = new stdClass;
        $data->socialLinks = json_decode(\File::get(base_path() . '/database/data/social-links.json'));
        $data->menuFooter = json_decode(\File::get(base_path() . '/database/data/menu-footer.json'));
        $title = 'TeaCode | Privacy Policy';
        return view('pages.privacy', ['data' => $data, 'title' => $title]);
    }

    public function terms(Request $request)
    {
        $data = new stdClass;
        $data->socialLinks = json_decode(\File::get(base_path() . '/database/data/social-links.json'));
        $data->menuFooter = json_decode(\File::get(base_path() . '/database/data/menu-footer.json'));
        $title = 'TeaCode | Terms of Use';
        return view('pages.terms', ['data' => $data, 'title' => $title]);
    }

    public function sitemap(Request $request)
    {
        $filePath = public_path() . '/storage/sitemap.xml';
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
        $path = public_path() . '/storage/sitemap.xml';
        \Spatie\Sitemap\SitemapGenerator::create('https://teacode.ma')->getSitemap()->writeToFile($path);
        return redirect('/sitemap');
    }
}
