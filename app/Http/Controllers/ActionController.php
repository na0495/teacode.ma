<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function getActions(Request $request)
    {
        $actions = getActions();
        return view('pages.actions.index', ['actions' => $actions]);
    }

    public function getEvents(Request $request)
    {
        $events = Event::orderBy('start_date', 'desc')->get();
        return view('pages.actions.events', ['events' => $events]);
    }

    public function getEvent(Request $request, Event $event)
    {
        $actions = getActions();
        return view('pages.actions.index', ['actions' => $actions, 'event' => $event]);
    }

    public function addEvent(Request $request)
    {
        $data = $request->all();
        if (isset($data['extended_props']) && $data['extended_props']) {
            $extended_props = [];
            foreach ($data['extended_props'] as $prop) {
                $x = str_replace('\n', '\\n', $prop[1]);
                $extended_props[$prop[0]] = $x;
            }
        }
        if ($data['end_date']) {
            $data['end_date'] = \Carbon\Carbon::createFromFormat('Y-m-d', $data['end_date']);
        }
        if ($data['days_of_week']) {
            $data['days_of_week'] = array_map(function ($i) {
                return (int)$i;
            }, explode(',', $data['days_of_week']));
            $event = Event::create([
                'start_time' =>  $data['start_time'],
                'end_time' => $data['end_time'],
                'start_date' => \Carbon\Carbon::createFromFormat('Y-m-d', $data['start_date']),
                'end_date' => $data['end_date'],
                'background_color' => $data['background_color'],
                'text_color' => $data['text_color'],
                'days_of_week' => $data['days_of_week'],
                'url' => $data['url'],
                'title' => $data['title'],
                'extended_props' => isset($extended_props) ? json_decode(json_encode($extended_props)) : null
            ]);
        } else {
            $event = Event::create([
                'start_time' =>  $data['start_time'],
                'end_time' => $data['end_time'],
                'start_date' => \Carbon\Carbon::createFromFormat('Y-m-d', $data['start_date']),
                'end_date' => $data['end_date'],
                'background_color' => $data['background_color'],
                'text_color' => $data['text_color'],
                'url' => $data['url'],
                'title' => $data['title'],
                'extended_props' => isset($extended_props) ? json_decode(json_encode($extended_props)) : null
            ]);
        }
        return back();
    }


    public function updateEvent(Request $request, Event $event)
    {
        $data = $request->all();
        if ($request->has('extended_props')) {
            $extended_props = [];
            foreach ($data['extended_props'] as $prop) {
                $x = str_replace('\n', '\\n', $prop[1]);
                $extended_props[$prop[0]] = $x;
            }
        }
        if ($data['days_of_week']) {
            $data['days_of_week'] = array_map(function ($i) {
                return (int)$i;
            }, explode(',', $data['days_of_week']));
            $event->update([
                'start_time' =>  $data['start_time'] ?? $event->start_time,
                'end_time' => $data['end_time'] ?? $event->end_time,
                'start_date' => $data['start_date'] ? \Carbon\Carbon::createFromFormat('Y-m-d', $data['start_date']) : $event->start_date,
                'end_date' => $data['end_date'] ? \Carbon\Carbon::createFromFormat('Y-m-d', $data['end_date']) : $event->end_date,
                'background_color' => $data['background_color'],
                'text_color' => $data['text_color'],
                'days_of_week' => $data['days_of_week'],
                'url' => $data['url'],
                'title' => $data['title'],
                'extended_props' => isset($extended_props) ? json_decode(json_encode($extended_props)) : null
            ]);
        } else {
            $event->update([
                'start_time' =>  $data['start_time'] ?? $event->start_time,
                'end_time' => $data['end_time'] ?? $event->end_time,
                'start_date' => $data['start_date'] ? \Carbon\Carbon::createFromFormat('Y-m-d', $data['start_date']) : $event->start_date,
                'end_date' => $data['end_date'] ? \Carbon\Carbon::createFromFormat('Y-m-d', $data['end_date']) : $event->end_date,
                'background_color' => $data['background_color'] == '#000000' ? null : $data['background_color'],
                'text_color' => $data['text_color'] == '#000000' ? null : $data['text_color'],
                'url' => $data['url'],
                'title' => $data['title'],
                'extended_props' => isset($extended_props) ? json_decode(json_encode($extended_props)) : null
            ]);
        }
        return ['event' => $event];
    }

    public function destroyEvent(Request $request, Event $event)
    {
        $event->delete();
        return ['event' => $event];
    }

    public function addContributor(Request $request)
    {

    }
}
