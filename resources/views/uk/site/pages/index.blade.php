@extends('site.layouts.main')

@section('title',__('site.home'))

@section('content')
    <div class="home">
        <h1>{{ __('site.home-title') }}</h1>
        <p class="lead">{{ __('site.home-text') }}</p>
        <div class="form-row">
            <div class="col-md-10 mb-3">
                <input type="text" class="form-control" name="url_site"
                       placeholder="{{ __('site.home-placeholder') }}" required>
                @if ($errors->has('url_site'))
                    <span class="text-danger">
                            <strong>{{ $errors->first('url_site') }}</strong>
                        </span>
                @endif
            </div>
            <div class="col-md-2 mb-3">
                <button class="btn btn-original" type="submit">{{ __('site.home-submit') }}</button>
            </div>
        </div>
    </div>
@endsection