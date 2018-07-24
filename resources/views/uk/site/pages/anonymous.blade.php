@extends('site.layouts.main')

@section('title',__('site.anonymous-title'))

@section('content')
    @include('site.include.title')
    <table class="table">
        <tr>
            <th>{{ __('site.anonymous-id') }}</th>
            <td>{{ $main->id }}</td>
        </tr>
        <tr>
            <th>{{ __('site.anonymous-url-key') }}</th>
            <td>{{ url('/').'/url/'.$main->id }}</td>
        </tr>
        <tr>
            <th>{{ __('site.anonymous-url-site') }}</th>
            <td>{{ $main->url_site }}</td>
        </tr>
        <tr>
            <th>{{ __('site.anonymous-views') }}</th>
            <td>{{ $main->views }}</td>
        </tr>
        <tr>
            <th>{{ __('site.anonymous-created') }}</th>
            <td>{{ $main->created_at }}</td>
        </tr>
    </table>
@endsection