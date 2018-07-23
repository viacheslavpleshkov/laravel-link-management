<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
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

    }

    public function url($url)
    {
        if ($main = Url::where('url_key', $url)->where('status', 1)->first())
            return redirect($main->url_site);
        else
            abort(404);

    }
}
