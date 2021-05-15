<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $data = new \stdClass;
        $data->activities = json_decode(\File::get(base_path() . '/database/data/activities.json'));
        $data->socialLinks = json_decode(\File::get(base_path() . '/database/data/social-links.json'));
        $data->menuFooter = json_decode(\File::get(base_path() . '/database/data/menu-footer.json'));
        $title = 'TeaCode | Turning Tea into Code';
        return view('pages.index', ['data' => $data, 'title' => $title]);
    }

}
