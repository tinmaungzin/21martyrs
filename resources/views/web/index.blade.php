@extends('web.layout.master')

@section('title', 'Home')

@section('content')

    <!-- Image Search -->
    <section class="banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>{{ __('ui.about_us') }}</h2>
                        <span style="font-size: 18px">{{ __('ui.about_us_long') }}</span>
                        <div class="blue-button">
                            <a class="scrollTo" data-scrollTo="popular" href="about.html">{{ __('ui.discover_more') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-1">
                    <div class="StaticBox">
                        <h3 class="boxTitle">
                            {{ __('ui.as_of_date', ['date' => Carbon\Carbon::now()->toFormattedDateString()]) }}</h3>
                        <div class="whiteBox">
                            <div class="rightText">
                                <h2 class="text-danger count">{{$stat->today_dead}}</h2>
                                <p>{{ __('ui.today_dead') }}</p>
                                <div class="subRightText">
                                    <h3 class="count">{{$stat->today_hurt}}</h3>
                                    <h3 class="count">{{$stat->today_detained}}</h3>
                                </div>
                                <div class="subRightText">
                                    <p>{{ __('ui.today_hurt') }}</p>
                                    <p>{{ __('ui.today_detained') }}</p>
                                </div>
                            </div>
                            <div class="leftText">
                                <h2 class="text-danger count">{{$stat->total_dead}}</h2>
                                <p>{{ __('ui.total_dead') }}</p>
                                <div class="subLeftText">
                                    <h3 class="count">{{$stat->total_hurt}}</h3>
                                    <h3 class="count">{{$stat->total_detained}}</h3>
                                </div>
                                <div class="subRightText">
                                    <p>{{ __('ui.total_hurt') }}</p>
                                    <p>{{ __('ui.total_detained') }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <div class="submit-form">
                            <form id="form-submit" action="{{ route('search') }}" method="post">
                                @csrf
                                <div class="row">
                                    {{-- <div class="col-md-3 first-item"> --}}
                                    {{-- <fieldset> --}}
                                    {{-- <input --}}
                                    {{-- name="name" --}}
                                    {{-- type="text" --}}
                                    {{-- class="form-control" --}}
                                    {{-- id="name" --}}
                                    {{-- placeholder="Your name..." --}}
                                    {{-- required="" --}}
                                    {{-- /> --}}
                                    {{-- </fieldset> --}}
                                    {{-- </div> --}}
                                    {{-- <div class="col-md-3 second-item"> --}}
                                    {{-- <fieldset> --}}
                                    {{-- <input --}}
                                    {{-- name="location" --}}
                                    {{-- type="text" --}}
                                    {{-- class="form-control" --}}
                                    {{-- id="location" --}}
                                    {{-- placeholder="Type location..." --}}
                                    {{-- required="" --}}
                                    {{-- /> --}}
                                    {{-- </fieldset> --}}
                                    {{-- </div> --}}
                                    <div class="col-md-3 first-item">
                                        <fieldset>
                                            <select  name="state_id">
                                                <option value="None" selected disabled>Select State and Region</option>
                                                @foreach($states as $state)
                                                <option value="{{$state->id}}">{{$state->name}}</option>
                                                    @endforeach


                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-3 second-item">
                                        <fieldset>
                                            <select name="status">
                                                <option value="None" selected disabled>Select Status</option>
                                                <option value="detained">Detained</option>
                                                <option value="dead">Dead</option>

                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-3 third-item">
                                        <fieldset>
                                            <select name="gender">
                                                <option value="None" selected disabled>Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>

                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-3">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="btn">
                                                Search Now
                                            </button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    </section>
    <!-- Image Search -->

    <!-- Card Container -->
    <section class="featured-Cards" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Detained/Dead Civilians</h2>
{{--                        <span>Latest Arrested Civilians</span>--}}
                        @if(isset($filters))
                        <h5>Applied Filters</h5>
                        @foreach($filters as $filter)
                        <h6>{{array_search($filter, $filters)}} : {{$filter}} </h6>
                            @endforeach
                            @endif
                    </div>
                </div>
            </div>
            @if(isset($filters))
            <p class="browse">
                <a href="{{route('index')}}">
                    {{ __('ui.browse_all') }}
                </a>
            </p>
            @endif
            <div class="row">

                @foreach ($posts as $post)
                    <a href="{{ route('profile', ['post' => $post->id]) }}">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="featured-item">
                                <div class="thumb">
                                    <img src="{{ $post->image }} " alt="" />
                                </div>
                                <div class="down-content">
                                    <h4>{{ $post->name }}</h4>
                                    <p>
                                        {{ $post->age }}
                                    </p>
                                    <p>
                                        {{ $post->state->name }}
                                    </p>
                                </div>
                            </div>
                        </div>

                    </a>
                @endforeach
                {{-- <div class="col-md-3 col-sm-6 col-xs-12"> --}}
                {{-- <div class="featured-item"> --}}
                {{-- <div class="thumb"> --}}
                {{-- <img src="{{asset('web/img/featured_item_2.jpg')}} " alt="" /> --}}
                {{-- </div> --}}
                {{-- <div class="down-content"> --}}
                {{-- <h4>Samson</h4> --}}
                {{-- <p> --}}
                {{-- 24 --}}
                {{-- </p> --}}
                {{-- <p> --}}
                {{-- Yangon --}}
                {{-- </p> --}}
                {{-- </div> --}}
                {{-- </div> --}}
                {{-- </div> --}}
                {{-- <div class="col-md-3 col-sm-6 col-xs-12"> --}}
                {{-- <div class="featured-item"> --}}
                {{-- <div class="thumb"> --}}
                {{-- <img src="{{asset('web/img/featured_item_3.jpg')}} " alt="" /> --}}
                {{-- </div> --}}
                {{-- <div class="down-content"> --}}
                {{-- <h4>Samson</h4> --}}
                {{-- <p> --}}
                {{-- 24 --}}
                {{-- </p> --}}
                {{-- <p> --}}
                {{-- Yangon --}}
                {{-- </p> --}}
                {{-- </div> --}}
                {{-- </div> --}}
                {{-- </div> --}}


            </div>
            {{-- <div class="row"> --}}
            {{-- <div class="col-md-3 col-sm-6 col-xs-12"> --}}
            {{-- <div class="featured-item"> --}}
            {{-- <div class="thumb"> --}}
            {{-- <img src="{{asset('web/img/featured_item_1.jpg')}} " alt="" /> --}}
            {{-- </div> --}}
            {{-- <div class="down-content"> --}}
            {{-- <h4>Samson</h4> --}}
            {{-- <p> --}}
            {{-- 24 --}}
            {{-- </p> --}}
            {{-- <p> --}}
            {{-- Yangon --}}
            {{-- </p> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- <div class="col-md-3 col-sm-6 col-xs-12"> --}}
            {{-- <div class="featured-item"> --}}
            {{-- <div class="thumb"> --}}
            {{-- <img src="{{asset('web/img/featured_item_2.jpg')}} " alt="" /> --}}
            {{-- </div> --}}
            {{-- <div class="down-content"> --}}
            {{-- <h4>Samson</h4> --}}
            {{-- <p> --}}
            {{-- 24 --}}
            {{-- </p> --}}
            {{-- <p> --}}
            {{-- Yangon --}}
            {{-- </p> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- <div class="col-md-3 col-sm-6 col-xs-12"> --}}
            {{-- <div class="featured-item"> --}}
            {{-- <div class="thumb"> --}}
            {{-- <img src="{{asset('web/img/featured_item_3.jpg')}} " alt="" /> --}}
            {{-- </div> --}}
            {{-- <div class="down-content"> --}}
            {{-- <h4>Samson</h4> --}}
            {{-- <p> --}}
            {{-- 24 --}}
            {{-- </p> --}}
            {{-- <p> --}}
            {{-- Yangon --}}
            {{-- </p> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- <div class="col-md-3 col-sm-6 col-xs-12"> --}}
            {{-- <div class="featured-item"> --}}
            {{-- <div class="thumb"> --}}
            {{-- <img src="{{asset('web/img/featured_item_3.jpg')}} " alt="" /> --}}
            {{-- </div> --}}
            {{-- <div class="down-content"> --}}
            {{-- <h4>Samson</h4> --}}
            {{-- <p> --}}
            {{-- 24 --}}
            {{-- </p> --}}
            {{-- <p> --}}
            {{-- Yangon --}}
            {{-- </p> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- </div> --}}
        </div>
        @include('web.layout.pagination', ['paginator' => $posts])

    </section>


    <script>
        $(document).ready(function()
        {
            $('.count').each(function () {
                let $this = $(this);
                $({ Counter: 0 }).animate({ Counter: $this.text() }, {
                    duration: 1000,
                    easing: 'swing',
                    step: function () {
                        $this.text(Math.ceil(this.Counter));
                    }
                });
            });
        })
    </script>


    <!-- Card Container -->

@endsection
