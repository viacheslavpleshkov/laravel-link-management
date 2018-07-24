<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Url;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.pages.index');
    }

    public function submit(Request $request)
    {
        Url::create([
            'url_site'=> "$request->url_site",
            'user_id'=> 1,
            'views'=> 0,
            'status' => 1,
        ]);
        return redirect()->route('site.anonymous',$id);
    }

    public function anonymous($id)
    {
        if ($main = Url::where('id', $id)->where('status', 1)->first())
            return view('site.pages.',compact($main));
        else
            abort(404);
    }

    public function url($id)
    {
        if ($main = Url::where('id', $id)->where('status', 1)->first()) {
            Url::where('id', $id)->increment('views');;
            return redirect($main->url_site);
        } else {
            abort(404);
        }
    }
}
