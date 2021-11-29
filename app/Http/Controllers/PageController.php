<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private $gotoController;
    public function __construct(GotoController $gotoController) {
        $this->gotoController = $gotoController;
    }

    public function getPage(Request $request, $page)
    {
        try {
            $page = str_replace('-', '', $page);
            return $this->$page($request, $page);
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }


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
                                    })->shuffle()->values();

        return view('pages.contributors', ['data' => $data]);
    }

    public function interview(Request $request)
    {
        $data = new \stdClass;
        $data->title = 'TeaCode | Book Interview';
        $data->availabilities = json_decode(\File::get(base_path() . '/database/data/interview-availability.json'));
        foreach ($data->availabilities as $key => $value) {
            $value->_date = \Carbon\Carbon::createFromFormat('Y-m-d', $value->date);
        }
        return view('pages.book-interview', ['data' => $data]);
    }

    public function calendar(Request $request)
    {
        $data = new \stdClass;
        $data->title = 'TeaCode | Calendar';
        return view('pages.calendar', ['data' => $data]);
    }

    public function resources(Request $request, $page)
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
        return view('pages.terms-of-use', ['data' => $data]);
    }

    public function comingSoon(Request $request)
    {
        $data = new \stdClass;
        $data->activities = json_decode(\File::get(base_path() . '/database/data/activities.json'));
        $data->title = 'TeaCode | Coming Soon ...';
        return view('pages.coming-soon', ['data' => $data]);
    }

    public function feedback(Request $request)
    {
        $data = new \stdClass;
        $data->title = 'TeaCode | Feedback';
        return view('pages.feedback');
    }

    public function rules(Request $request)
    {
        $data = new \stdClass;
        $data->title = 'TeaCode | Rules';
        return view('pages.rules');
    }

    public function faq(Request $request)
    {
        $data = new \stdClass;
        $data->title = 'TeaCode | FAQ';
        return view('pages.faq.index');
    }
}
