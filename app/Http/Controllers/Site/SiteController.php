<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App;
use App\Aboutme;
use App\Experience;
use App\Skill;
use App\Project;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Cache::has('site.index')) {
            $main = Cache::get('site.index');
        } else {
            $main['aboutme'] = Aboutme::where('status', 1)->get();
            $main['experiences'] = Experience::where('status', 1)->orderBy('id', 'desc')->get();
            $main['skills'] = Skill::where('status', 1)->get();
            $main['projects'] = Project::where('status', 1)->get();
            Cache::put('site.index', $main, 2880);
        }
        return view('site.index', compact('main'));
    }
}
