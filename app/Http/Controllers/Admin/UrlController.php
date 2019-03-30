<?php

namespace App\Http\Controllers\Admin;

use App\Models\Url;
use App\Http\Requests\Url as Request;
use Illuminate\Support\Facades\Auth;

class UrlController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $main = Url::where('user_id', Auth::user()->id)->get();
        return view('admin.urls.index', compact('main'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.urls.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Url::create([
            'url_site' => $request->url_site,
            'views' => 0,
            'user_id' => Auth::user()->id,
            'status' => $request->status,
        ]);
        return redirect()->route('urls.index')->with('success', __('admin.created-success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Url::where('user_id', Auth::user()->id)) {
            $main = Url::find($id);
            return view('admin.urls.show', compact('main'));
        } else
            abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Url::where('user_id', Auth::user()->id)) {
            $main = Url::find($id);
            return view('admin.urls.edit', compact('main'));
        } else
            abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Url::where('user_id', Auth::user()->id)) {
            Url::find($id)->update([
                'url_site' => $request->url_site,
                'status' => $request->status
            ]);
            return redirect()->route('urls.index')->with('success', __('admin.updated-success'));
        } else
            abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Url::where('user_id', Auth::user()->id)) {
            Url::find($id)->delete();
            return redirect()->route('urls.index')->with('success', __('admin.information-deleted'));
        } else
            abort(403);
    }
}
