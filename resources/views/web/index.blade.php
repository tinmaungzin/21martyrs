@extends('web.layout.master')

@section('title', 'Home')

@section('content')

    <!-- Image Search -->
    <section class="banner" id="top">
        <div class="container">
            <div class="row">

                <div class="Test">


                    <div class="col-md-5 col-md-offset-1">
                        <div class="banner-caption">
                            <div class="line-dec"></div>
                            <h2>{{ __('home.about_us') }}</h2>
                            <span style="font-size: 18px">{{ __('home.about_us_long') }}</span>
                            <div class="blue-button">
                                <a class="scrollTo" data-scrollTo="popular"

                                   href="{{route('about')}}">{{ __('home.discover_more') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-1">

                        <div class="staticBox">
                            <div class="TopBox">
                                <h4 class="titleText">{{ __('home.as_of_date', ['date' => Carbon\Carbon::now()->toFormattedDateString()]) }}</h4>
                                <div class="TopText">
                                    <h1 class="count">{{is_null($stat) ? 0: $stat->total_death}}</h1>
                                    <h4>Total death</h4>
                                </div>
                                <div class="MiddleText">
                                    <h1 class="count">{{is_null($stat) ? 0: $stat->headshot}}</h1>
                                    <h1 class="count">{{is_null($stat) ? 0: $stat->gunshot}}</h1>
                                    <h1 class="count">{{is_null($stat) ? 0: $stat->assault}}</h1>
                                </div>
                                <div class="subMiddleText">
                                    <h4>Headshot</h4>
                                    <h4>Gunshot</h4>
                                    <h4>Assault</h4>
                                </div>
                            </div>
                            <div class="SubstaticBox">
                                <div class="SubTitle">
                                    <h1 class="count">{{is_null($stat) ? 0: $stat->abducted}}</h1>
                                    <h1 class="count">{{is_null($stat) ? 0: $stat->released}}</h1>
                                </div>
                                <div class="SubText">
                                    <h4>Abducted</h4>
                                    <h4>Released</h4>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div>
                    <div class="submit-form">
                        <form id="form-submit" autocomplete="on">
                            <div class="row">

                                <div class="col-md-3 first-item">
                                    <fieldset>
                                        <input type="text" list="country" id="name_search" name="name" autocomplete="off"
                                               placeholder="{{__('home.filter_name')}}">
                                        <datalist id="country">

                                            <option value="U.S.">
                                            <option value="France">
                                            <option value="China">
                                            <option value="Cambodia">
                                            <option value="Chile">
                                            <option value="Canada">
                                            <option value="Poland">

                                        </datalist>
                                    </fieldset>

{{--<<<<<<< HEAD--}}
{{--                                    <div id="name_suggestion"  style="display: block; cursor: pointer;"></div>--}}

{{--=======--}}
{{--                                    --}}
{{--                                    --}}
{{-->>>>>>> origin/thetpai--}}
                                </div>

                                <div class="col-md-3 second-item">
                                    <fieldset>
                                        <select name="state">
                                            <option value="" selected
                                                    disabled>{{ __('home.filter_state') }}
                                            </option>
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach

                                        </select>
                                    </fieldset>
                                </div>

                                <div class="col-md-3 third-item">
                                    <fieldset>
                                        <select name="status">
                                            <option value="" selected disabled>{{ __('home.filter_status') }}</option>
                                            <option value="detained">{{ __('home.detained') }}</option>
                                            <option value="dead">{{ __('home.dead') }}</option>
                                            <option value="released">{{ __('home.released') }}</option>
                                            <option value="missing">{{ __('home.missing') }}</option>

                                        </select>
                                    </fieldset>
                                </div>


                                <div class="col-md-3">
                                    <fieldset>
                                        <button onclick="location = this.value;" type="submit" id="form-submit"
                                                class="btn">
                                            {{__('home.search')}}
                                        </button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="name_suggestion"></div>
    <!-- Image Search -->

    <!-- Card Container -->
    <section class="featured-Cards" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>{{ __('home.deaths_and_detainees') }}</h2>
                        @if($query_string != [])
                            <h5>Applied Filters</h5>
                            @foreach($query_string as $string)
                                <h6>{{ ucfirst(array_search($string, $query_string)) }} : {{ ucfirst($string) }} </h6>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            @if($query_string != [])
                <p class="browse">
                    <a href="{{route('index')}}">
                        {{ __('home.browse_all') }}
                    </a>
                </p>
            @endif

            <div class="row">
                @if (count($posts) < 1)
                    @include('components.empty')
                @else
                    @foreach ($posts as $post)
                        <a href="{{ route('profile', ['post' => $post->id]) }}">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="featured-item">
                                    <div class="thumb">
                                        @if(!\App\Utility\StringUtility::isEmpty($post->profile_url))
                                            <img
                                                style="object-fit: cover"
                                                height="260"
                                                src="{{ $post->profile_url }}" alt="{{$post->name}}"/>
                                        @else
                                            <img height="260" src="{{ asset('web/img/default-profile.jpg') }}"
                                                 alt="{{$post->name}}"/>

                                        @endif
                                    </div>
                                    <div class="down-content">
                                        <h4>{{ Str::limit($post->name,18,'...') }}</h4>
                                        <p>
                                            {{ App\Utility\StringUtility::isEmpty(strval($post->age)) ? __('home.unknown'): $post->age }}
                                            years old
                                        </p>
                                        <p>
                                            {{is_null($post->state) ? __('home.unknown'): $post->state->name }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </a> @endforeach
                @endif
            </div>

        </div>
        @include('web.layout.pagination', ['paginator' => $posts->appends($query_string)])
        {{--        {{ $posts->onEachSide(2)->links() }}--}}
    </section>
    @include('web.layout.success_msg')


    <!-- Card Container -->
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>
    <script defer>
        function ajaxHeaders() {
            return $.ajaxSetup({
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
        }

        function setName(name) {
            $("#name_search").val(name);
            $('#name_suggestion').empty();
        }

        function emptySuggestion() {
            if ($('#name_search').val() === '') {
                $('#name_suggestion').empty();

            }


        }

        // function fetchNames() {
        //     // $('#name_suggestion').empty();
        //
        //
        //     // let names='';
        //     const debouncedSearch = _.debounce(function () {
        //
        //         // emptySuggestion();
        //
        //
        //         $('#name_suggestion').empty();
        //
        //         let form = {
        //             'name': $('#name_search').val()
        //         };
        //
        //         ajaxHeaders();
        //
        //         $.post('/fetch_names', JSON.stringify(form))
        //             .done(function (data) {
        //                 if (data.success) {
        //                     // names = data.names;
        //                     data.names ={
        //                         name: 'Ok'
        //                     }
        //                     data.names.forEach(function (name) {
        //                         $('#name_suggestion').append(`
        //                                 <p onclick="setName('${name.name}')">${name.name}</p>
        //                         `)
        //                     });
        //                 }
        //             });
        //         // names = '';
        //     }, 300, {trailing: true})
        //     $('#name_search').keyup(debouncedSearch);
        // }


        function fetchNames() {
            // $('#name_suggestion').empty();


            // let names='';
            $('#name_search').keyup(function (){
                console.log('here')
                $('#name_suggestion').empty();

                let form = {
                    'name': $('#name_search').val()
                };

                ajaxHeaders();
                $.post('/fetch_names', JSON.stringify(form))
                    .done(function (data) {
                        if (data.success) {
                            // names = data.names;
                            // data.names ={
                            //     name: 'Ok'
                            // }
                            data.names.forEach(function (name) {
                                $('#name_suggestion').append(`
                                        <p onclick="setName('${name.name}')">${name.name}</p>
                                `)
                            });
                        }
                    });
            })
        }

        $(document).ready(function () {

            // emptySuggestion();
            fetchNames();


            $('.count').each(function () {
                let $this = $(this);
                $({Counter: 0}).animate({Counter: $this.text()}, {
                    duration: 1000,
                    easing: 'swing',
                    step: function () {
                        $this.text(Math.ceil(this.Counter));
                    }
                });
            });


        })
    </script>
@endsection
