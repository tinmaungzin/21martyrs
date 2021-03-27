@extends('web.layout.master')

@section('title', 'Experience Sharing')

@section('content')
    <section class="featured-Cards list-cards" id="blog">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Experience Sharing Section</h2>

                    </div>
                </div>
            </div>
            <div class="row">
                @if($articles->toArray()['total'] <= 0)
                    @include('components.empty')
                @else
                    @foreach($articles as $article)
                        <a href="{{route('show.experience',['article'=> $article->id])}}">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="featured-item">
                                    <div class="thumb">
                                        <img src="{{$article->feature_image_url}}" alt="{{$article->title}}"/>
                                    </div>
                                    <div class="down-content">
                                        <h4>{{$article->title}}</h4>
                                        <p>{{$article->author_name}}</p>
                                        <p>{{$article->updated_at->diffForHumans()}}</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                    @endforeach
                @endif

            </div>

            @include('web.layout.pagination', ['paginator' => $articles])

        </div>
    </section>
    @include('web.layout.success_msg')


@endsection
