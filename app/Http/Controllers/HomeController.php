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
        $data->find_us = json_decode(\File::get(base_path() . '/database/data/find_us.json'));

        return view('index', ['data' => $data]);
    }
}
