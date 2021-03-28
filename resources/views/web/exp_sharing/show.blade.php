@extends('web.layout.master')

@section('title', 'Experience Sharing')

@section('content')


    <section class="ExpBody" id="top">
        <div class="container expContainer">
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

            </div>
            <hr />
        </div>
    </section>
    @include('web.layout.success_msg')

@endsection
