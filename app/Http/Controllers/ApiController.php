<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getEvents(Request $request)
    {
        $events = json_decode(\File::get(base_path() . '/database/data/events.json'));
        return $events;
    }
}
