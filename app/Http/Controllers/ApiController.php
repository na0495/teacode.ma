<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function updateBanner(Request $request)
    {
        try {
            $data = $request->all();
            \File::put(base_path() . '/database/data/banner.json', json_encode($data));
            return 'OK';
        } catch (\Throwable $th) {
            \File::put(base_path() . '/database/data/banner.json', null);
            return 'NOK';
        }
    }

    public function getEvents(Request $request)
    {
        $events = json_decode(\File::get(base_path() . '/database/data/events.json'));
        return $events;
    }
}
