@extends('admin.layouts.main')

@section('title',__('admin.edit-urls'))

@section('content')
    @include('admin.includes.title')
    @include('admin.includes.error')
    <form action="{{ route('urls.update',$main->id) }}" method="POST">
        @csrf
        @method('PUT')
        <fieldset disabled>
            <div class="form-group">
                <label>{{ __('admin.urls-url_key') }}</label>
                <input type="text" class="form-control" name="id" value="{{ url('/') .'/url/'.$main->id }}" required>
            </div>
        </fieldset>
        <div class="form-group">
            <label>{{ __('admin.urls-url_site') }}</label>
            <input type="text" class="form-control" name="url_site" value="{{ $main->url_site }}"
                   placeholder="{{ __('admin.urls-enter-url_site') }}" required>
        </div>

        <fieldset disabled>
            <div class="form-group">
                <label>{{ __('admin.urls-views') }}</label>
                <input type="text" class="form-control" name="views" value="{{ $main->views }}" required>
            </div>

            <div class="form-group">
                <label>{{ __('admin.created') }}</label>
                <input type="text" class="form-control" name="created" value="{{ $main->created_at }}" required>
            </div>
        </fieldset>

        <div class="form-group">
            <label>{{ __('admin.status') }}</label>
            <select class="form-control" name="status" required>
                @if($main->status)
                    <option value="1">{{ __('admin.enabled') }}</option>
                    <option value="0">{{ __('admin.disabled') }}</option>
                @else
                    <option value="0">{{ __('admin.disabled') }}</option>
                    <option value="1">{{ __('admin.enabled') }}</option>
                @endif
            </select>
        </div>

        <button class="btn btn-lg btn-original btn-block" type="submit">{{ __('admin.edit') }}</button>
    </form>
@endsection