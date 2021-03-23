{{--@extends('web.layout.master')--}}

{{--@section('title','Application Error found')--}}

{{--@section('content')--}}
{{--    <div class="error-section">--}}
{{--        <img src="{{asset('images/icons/500-icon.svg')}}" alt="application error icon"--}}
{{--             class="error-icon"--}}
{{--        />--}}
{{--        <div data-error="{{$exception->getMessage()}}" style="display: none"></div>--}}
{{--        <h4 class="bg-danger text-danger" style="padding: 1rem; display: inline-block">--}}
{{--            {{__('ui.500_error')}}--}}
{{--        </h4>--}}
{{--        <br/>--}}
{{--        <a href="{{ route('index') }}" class="btn btn-info">{{ __('ui.back_to_home') }}</a>--}}
{{--    </div>--}}
{{--@endsection--}}

@extends('errors.minimal')

@section('message',__('ui.500_error'))
