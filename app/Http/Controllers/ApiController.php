<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getEvents(Request $request)
    {
        $dates = array_values($request->all());

        $_events = Event::where(function ($q) use ($dates) {
            $q->where('start_date', '>=', $dates[0])
            ->where('start_date', '<=', $dates[1]);
        })->orWhere(function ($q) use ($dates) {
            $q->where('end_date', '>=', $dates[0])
            ->where('end_date', '<=', $dates[1]);
        })->orWhere(function ($q) use ($dates) {
            $q->where('start_date', '<=', $dates[0])->where('start_date', '<=', $dates[1])
            ->where('end_date', '>=', $dates[0])->where('end_date', '>=', $dates[1]);
        })
        ->get();


        $events = $_events->map(function ($_e){
            if ($_e->days_of_week) {
                $e = (object) [
                    'startTime' => $_e->start_time,
                    'endTime' => $_e->end_time,
                    'startRecur' => $_e->start_date,
                    'endRecur' => $_e->end_date,
                    'backgroundColor' => $_e->background_color,
                    'textColor' => $_e->text_color,
                    'daysOfWeek' => $_e->days_of_week,
                    'url' => $_e->url,
                    'title' => $_e->title,
                    'classNames' => 'cursor-pointer',
                    'extendedProps' => json_decode(json_encode($_e->extended_props))
                ];
            } else {
                $e = (object) [
                    'start' => $_e->start_date . ' ' . $_e->start_time,
                    'end' => $_e->end_date . ' ' . $_e->end_time,
                    'backgroundColor' => $_e->background_color,
                    'textColor' => $_e->text_color,
                    'url' => $_e->url,
                    'title' => $_e->title,
                    'classNames' => 'cursor-pointer',
                    'extendedProps' => json_decode(json_encode($_e->extended_props))
                ];
            }
            return $e;
        });

        return $events;
    }

    public function getNextEvent(Request $request)
    {
        $event = getNextEvent();
        return ['event' => $event];
    }
}
