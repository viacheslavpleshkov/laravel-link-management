<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\Site as Request;
use App\Models\Url;

class SiteController extends BaseController
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
		$id = Url::create([
			'url_site' => $request->url_site,
			'user_id' => 1,
			'views' => 0,
			'status' => 1,
		]);
		return redirect()->route('site.anonymous', $id->id);
	}

	public function anonymous($id)
	{
		if ($main = Url::findurl($id)->status()->anonymoususer()->first())
			return view('site.pages.anonymous', compact('main'));
		else
			abort(404);
	}

	public function url($id)
	{
		if ($main = Url::findurl($id)->status()->first()) {
			Url::findurl($id)->increment('views');;
			return redirect($main->url_site);
		} else {
			abort(404);
		}
	}
}
