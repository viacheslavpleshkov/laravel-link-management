@extends('admin.layouts.main')

@section('title',__('admin.show-roles'))

@section('content')
    @include('en.admin.includes.title')
    <ul class="nav mb-md-3">
        <li>
            <a href="{{ route('roles.index') }}" class="btn btn-dark">{{ __('admin.back') }}</a>
            <a href="{{ route('roles.edit', $main->id) }}" class="btn btn-primary">{{ __('admin.update') }}</a>
            <form action="{{ route('roles.destroy', $main->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">{{ __('admin.delete') }}</button>
            </form>
        </li>
    </ul>
    <table class="table">
        <tr>
            <th>{{ __('admin.roles-id') }}</th>
            <td>{{ $main->id }}</td>
        </tr>
        <tr>
            <th>{{ __('admin.roles-name') }}</th>
            <td>{{ $main->name }}</td>
        </tr>
        <tr>
            <th>{{ __('admin.roles-description') }}</th>
            <td>{{ $main->description }}</td>
        </tr>
    </table>
@endsection