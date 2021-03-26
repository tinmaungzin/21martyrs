@extends('web.layout.master')

@section('title', 'Experience Sharing')

@section('content')


    <section class="ExpBody" id="top">
        <div class="container expContainer">
            <h2>Experience sharing</h2>
            <hr />
{{--            <p class="ExpText">Please review your article before submitting</p>--}}
            <div class="ExpImage">
                <img src="{{$article->feature_image_url}}" alt="{{$article->title}}" />
            </div>
        </div>
        <div class="container expContainer">
            <h2>{{$article->title}}</h2>
            <p class="ExpText">{{$article->author_name}} | {{$article->updated_at->diffForHumans()}}</p>
            <hr />

            <div class="BodyText">

                {!! $article->content !!}
{{--                <p>--}}
{{--                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis--}}
{{--                    quod fugit aliquam? Deserunt reprehenderit similique dignissimos--}}
{{--                    eligendi quo sunt quae vitae in, nulla sint hic culpa fugit illum--}}
{{--                    nam praesentium? Lorem ipsum dolor, sit amet consectetur adipisicing--}}
{{--                    elit. Facilis quod fugit aliquam? Deserunt reprehenderit similique--}}
{{--                    dignissimos eligendi quo sunt quae vitae in, nulla sint hic culpa--}}
{{--                    fugit illum nam praesentium?--}}
{{--                </p>--}}
            </div>
            <hr />
{{--            <p class="ExpText">Key words : Prison,police,protesters</p>--}}
{{--            <div class="buttonArea">--}}
{{--                <a class="btn editButton" href="ExpSharing.html" role="button"--}}
{{--                >Edit</a--}}
{{--                >--}}

{{--                <a class="btn submitButton" href="#" role="button">Submit</a>--}}
{{--            </div>--}}
        </div>
    </section>
    @include('web.layout.success_msg')

@endsection
