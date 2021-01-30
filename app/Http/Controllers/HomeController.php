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
        // FOR NOW
        return $this->content($request, 'ar');
    }

    public function index(Request $request)
    {
        $data = new stdClass;
        $data->keys = json_decode(\File::get(base_path() . '/database/data/menu.json'));
        foreach ($data->keys as $item) {
            if (!$item->ignoreJson) {
                $slug = $item->slug;
                $data->$slug = json_decode(\File::get(base_path() . '/database/data/' . $slug . '.json'));
            }
        }
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
