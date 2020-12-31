<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request, $var = null)
    {
        if($var) {
            return redirect('/');
        }
        // FOR NOW
        $content = config('data.content.ar');
        return view('sections.lang', ['content' => $content]);
        // return view('home');
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
