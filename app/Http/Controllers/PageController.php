<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function contributors(Request $request)
    {
        $data = new \stdClass;
        $data->contributors = json_decode(\File::get(base_path() . '/database/data/contributors.json'));
        $data->title = 'TeaCode | Contributors';

        $data->contributors = collect($data->contributors)
                                    ->map(function ($contributor, $key) {
                                        // $contributor->color =  getColorRole($contributor->role);
                                        $contributor->image = getContributorImage($contributor, $key);
                                        $contributor->badge = getContributorBadge($contributor);
                                        return $contributor;
                                    })->values();

        return view('pages.contributors', ['data' => $data]);
    }

    public function resources(Request $request)
    {
        $data = new \stdClass;
        $data->resources = json_decode(\File::get(base_path() . '/database/data/resources.json'));
        $data->title = 'TeaCode | Resources';
        return view('pages.resources', ['data' => $data]);
    }

    public function privacy(Request $request)
    {
        $data = new \stdClass;
        $data->title = 'TeaCode | Privacy Policy';
        return view('pages.privacy', ['data' => $data]);
    }

    public function terms(Request $request)
    {
        $data = new \stdClass;
        $data->title = 'TeaCode | Terms of Use';
        return view('pages.terms', ['data' => $data]);
    }

    public function comingSoon(Request $request)
    {
        $data = new \stdClass;
        $data->activities = json_decode(\File::get(base_path() . '/database/data/activities.json'));
        $data->title = 'TeaCode | Coming Soon ...';
        return view('pages.coming-soon', ['data' => $data]);
    }
}
