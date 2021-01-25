<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request, $var = null)
    {
        if ($var) {
            return redirect('/');
        }
        // FOR NOW
        return $this->content($request, 'ar');
    }

    public function index(Request $request)
    {
        $activities = json_decode(\File::get(base_path() . '/database/data/activities.json'));
        $events = json_decode(\File::get(base_path() . '/database/data/events.json'));
        $data = ['activities' => $activities, 'events' => $events];
        // dd($data);
        return view('index', ['data' => $data]);
    }

    public function content(Request $request, $lang)
    {
        // $lang = $lang ?? 'ar';
        if (!inLanguages($lang)) {
            return redirect('/');
        }
        $content = config('data.content.' . $lang);
        return view('sections.lang', ['content' => $content]);
    }

    public function links(Request $request)
    {
        $links = config('data.links');
        return view('sections.links', ['links' => $links]);
    }
}
