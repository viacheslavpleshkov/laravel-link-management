@extends('admin.layouts.main')

@section('title',__('admin.show-urls'))

@section('content')
    @include('admin.includes.title')
    <ul class="nav mb-md-3">
        <li>
            <a href="{{ route('urls.index') }}" class="btn btn-dark">{{ __('admin.back') }}</a>
            <a href="{{ route('urls.edit', $main->id) }}" class="btn btn-primary">{{ __('admin.update') }}</a>
            <form action="{{ route('urls.destroy', $main->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">{{ __('admin.delete') }}</button>
            </form>
        </li>
    </ul>
    <table class="table">
        <tr>
            <th>{{ __('admin.urls-url_key') }}</th>
            <td>{{ route('site.url', $main->id) }}</td>
        </tr>
        <tr>
            <th>{{ __('admin.urls-url_site') }}</th>
            <td>{{ $main->url_site }}</td>
        </tr>
        <tr>
            <th>{{ __('admin.urls-views') }}</th>
            <td>{{ $main->views }}</td>
        </tr>
        <tr>
            <th>{{ __('admin.created') }}</th>
            <td>{{ $main->created_at }}</td>
        </tr>
        <tr>
            <th>{{ __('admin.status') }}</th>
            <td>
                @if($main->status)
                    {{ __('admin.enabled') }}
                @else
                    {{ __('admin.disabled') }}
                @endif
            </td>
        </tr>
    </table>
@endsection