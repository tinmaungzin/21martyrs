@extends('web.layout.master')
@section('title', __('ui.404_title'))


@section('content')
    <div style="text-align: center; padding-top: 5rem">
        <img src="{{ asset('images/icons/404-icon.svg') }}" alt="Error 404 icon"
            style="max-width: 100%; max-height: 350px" />
        <h4>
            {{ __('ui.page_not_found') }}
        </h4>
        <a href="{{ route('index') }}" class="btn btn-info">{{ __('ui.back_to_home') }}</a>
    </div>
@endsection
