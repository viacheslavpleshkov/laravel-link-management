@extends('site.layouts.main')

@section('title',__('admin.home'))

@section('content')
    <div class="home">
        <h1>{{ __('site.home-title') }}</h1>
        <p class="lead">{{ __('site.home-text') }}</p>
        <form class="text-center" method="POST" action="{{ route('site.index') }}">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="col-md-11 mb-3">
                    <input type="text" class="form-control" name="url_site"
                           placeholder="{{ __('site.home-placeholder') }}" required>
                </div>
                <div class="col-md-1">
                    <button class="btn btn-original" type="submit">{{ __('site.home-submit') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection