@extends('web.layout.master')

@section('title', 'Experience Sharing')

@section('content')

<div class="ComingArea">
    <img src="Coming-Soon-Tile.png" alt="">
</div>
    <section class="ExpSharing">
        <div class="container expContainer">
            <h2 class="ExpTitle">Experience sharing</h2>
            <hr />
            <p class="ExpText">You can write us your experience here</p>
            <div class="col-md-7 ExpForm">
                <div class="ExpForm">

                    <div class="row formRow">
                        <p class="col-md-4 formText">Name</p>
                        <div class="col-sm-10 col-md-6">
                            <input disabled
                                type="email"
                                class="form-control form-control-sm"
                                id="colFormLabelSm"
                                placeholder="name"
                            />
                        </div>
                    </div>
                    <div class="row formRow">
                        <p class="col-md-4 formText">Email</p>
                        <div class="col-sm-10 col-md-6">
                            <input
                            disabled
                                type="email"
                                class="form-control form-control-sm"
                                id="colFormLabelSm"
                                placeholder="email"
                            />
                        </div>
                    </div>
                    <div class="row formRow">
                        <p class="col-md-4 formText">Title</p>
                        <div class="col-sm-10 col-md-6">
                            <input disabled
                                type="email"
                                class="form-control form-control-sm"
                                id="colFormLabelSm"
                                placeholder="title"
                            />
                        </div>
                    </div>
                    <div class="row formRow">
                        <p class="col-md-4 formText">Key words</p>
                        <div class="col-sm-10 col-md-6">
                            <input disabled
                                type="email"
                                class="form-control form-control-sm"
                                id="colFormLabelSm"
                                placeholder="Key words"
                            />
                        </div>
                    </div>
                    <div class="row formRow">
                        <p class="col-md-4 formText">Body Text</p>
                        <div class="col-sm-10 col-md-6">
                <textarea
                disabled
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="6"
                ></textarea>
                        </div>
                    </div>

                    <div class="row formRow">
                        <p class="col-md-4 formText">Is it your own experience?</p>
                        <div class="col-sm-10 col-md-6 CheckExp">
                            <div class="form-check">
                                <input disabled
                                    class="form-check-input"
                                    type="checkbox"
                                    id="gridCheck1"
                                />
                                <label class="form-check-label" for="gridCheck1"> Yes </label>
                            </div>
                            <div class="form-check">
                                <input disabled
                                    class="form-check-input"
                                    type="checkbox"
                                    id="gridCheck1"
                                />
                                <label class="form-check-label" for="gridCheck1"> No </label>
                            </div>
                        </div>
                    </div>
                    <div class="row formRow">
                        <p class="col-md-4 formText">Name of the original author</p>
                        <div class="col-sm-10 col-md-6">
                            <input disabled
                                type="email"
                                class="form-control form-control-sm"
                                id="colFormLabelSm"
                                placeholder="Name"
                            />
                        </div>
                    </div>
                    <div class="row formRow">
                        <p class="col-md-4 formText">Source</p>
                        <div class="col-sm-10 col-md-6">
                            <input disabled
                                type="email"
                                class="form-control form-control-sm"
                                id="colFormLabelSm"
                                placeholder="URL"
                            />
                        </div>
                    </div>
                    <div class="PreviewArea">
                        <a class="btn submitButton" href="ExpConfirm.html" disabled role="button"
                        >Preview</a
                        >
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="ExpCards">
                    @if($articles->toArray()['total'] <= 0)
                        @include('components.empty')
                    @else
                        @foreach($articles as $article)

                            <a href="{{route('show.experience',['article'=> $article->id])}}">
                                <div class="featured-item">
                                    <div class="thumb">
                                        <img src="{{$article->feature_image_url}}" alt="{{$article->title}}" />
                                    </div>
                                    <div class="down-content">
                                        <h4>{{$article->title}}</h4>
                                        <p>{{$article->author_name}}</p>
                                        <p>{{$article->updated_at->diffForHumans()}}</p>
                                    </div>
                                </div>
                            </a>

                        @endforeach
                    @endif

                </div>
                @include('web.layout.pagination', ['paginator' => $articles])

            </div>
        </div>
    </section>

    @include('web.layout.success_msg')




{{--    <div class="row">--}}
{{--        @if($articles->toArray()['total'] <= 0)--}}
{{--            @include('components.empty')--}}
{{--        @else--}}
{{--            @foreach($articles as $article)--}}
{{--                <a href="{{route('show.experience',['article'=> $article->id])}}">--}}
{{--                    <div class="col-md-3 col-sm-6 col-xs-12">--}}
{{--                        <div class="featured-item">--}}
{{--                            <div class="thumb">--}}
{{--                                <img src="{{$article->feature_image_url}}" alt="{{$article->title}}"/>--}}
{{--                            </div>--}}
{{--                            <div class="down-content">--}}
{{--                                <h4>{{$article->title}}</h4>--}}
{{--                                <p>{{$article->author_name}}</p>--}}
{{--                                <p>{{$article->updated_at->diffForHumans()}}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}

{{--            @endforeach--}}
{{--        @endif--}}

{{--    </div>--}}

{{--    @include('web.layout.pagination', ['paginator' => $articles])--}}

@endsection
