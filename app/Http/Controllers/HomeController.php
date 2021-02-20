<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class HomeController extends Controller
{
    public function home(Request $request, $var = null)
    {
        if ($var) {
            return redirect('/');
        }
        $data = new stdClass;
        $data->activities = json_decode(\File::get(base_path() . '/database/data/activities.json'));
        $data->socialLinks = json_decode(\File::get(base_path() . '/database/data/social-links.json'));
        $title = 'TeaCode - Turning Tea into Code';
        return view('index', ['data' => $data, 'title' => $title]);
    }

    public function privacy(Request $request)
    {
        $data = new stdClass;
        $data->socialLinks = json_decode(\File::get(base_path() . '/database/data/social-links.json'));
        $title = 'TeaCode Privacy Policy';
        return view('privacy', ['data' => $data, 'title' => $title]);
    }

    public function terms(Request $request)
    {
        $data = new stdClass;
        $data->socialLinks = json_decode(\File::get(base_path() . '/database/data/social-links.json'));
        $title = 'TeaCode Terms of Use';
        return view('terms', ['data' => $data, 'title' => $title]);
    }
}
