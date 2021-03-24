@extends('web.layout.master')

@section('title', 'Profile')

@section('content')

    <div>
        <div class="profileBody">
            <div class="profilePicture">
                <img
                    src="{{$post->profile_url}}"
                    alt="{{$post->name}}"
                />
            </div>
            <div class="profileDetail">
                <h3>Arrestee's Info</h3>
                <div class="profileDetailBox">
                    <div class="profileHeaders">
                        <span>Name</span>
                    </div>
                    <div class="profileValues">
                        <span>{{$post->name}}</span>
                    </div>
                </div>
                <div class="profileDetailBox">
                    <div class="profileHeaders">
                        <span>Age</span>
                    </div>
                    <div class="profileValues">
                        <span>{{$post->age}}</span>
                    </div>
                </div>
                <div class="profileDetailBox">
                    <div class="profileHeaders">
                        <span>Gender</span>
                    </div>
                    <div class="profileValues">
                        <span>{{$post->gender}}</span>
                    </div>
                </div>
                <div class="profileDetailBox">
                    <div class="profileHeaders">
                        <span>Arrested Date</span>
                    </div>
                    <div class="profileValues">
                        <span>{{$post->detained_date}}</span>
                    </div>
                </div>
                <div class="profileDetailBox">
                    <div class="profileHeaders">
                        <span>Occupation</span>
                    </div>
                    <div class="profileValues">
                        <span>{{$post->occupation}}</span>
                    </div>
                </div>
                @if($post->status == 'detained')
                <div class="profileDetailBox">
                    <div class="profileHeaders">
                        <span>Reason of being arrested</span>
                    </div>
                    <div class="profileValues">
                        <span>{{$post->reason_of_arrest}}</span>
                    </div>
                </div>
                    @endif
                @if($post->status == 'dead')
                    <div class="profileDetailBox">
                        <div class="profileHeaders">
                            <span>Reason of being Dead</span>
                        </div>
                        <div class="profileValues">
                            <span>{{$post->reason_of_dead}}</span>
                        </div>
                    </div>
                    @endif

                @if(isset($post->prison))
                <div class="profileDetailBox">
                    <div class="profileHeaders">
                        <span>Prison</span>
                    </div>
                    <div class="profileValues">
                        <span>{{$post->prison}}</span>
                    </div>
                </div>
                @endif
                <div class="profileDetailBox">
                    <div class="profileHeaders">
                        <span>Status</span>
                    </div>
                    <div class="profileValues">
                        <span>{{$post->status}}</span>
                    </div>
                </div>

                <div class="editButton">
                    @if($post->status == 'detained')
                    <a href="{{route('form.edit.detained',['post'=> $post->id])}}">
                        <button>Edit</button>
                    </a>
                        @endif
                        @if($post->status == 'dead')
                            <a href="{{route('form.edit.dead',['post'=> $post->id])}}">
                                <button>Edit</button>
                            </a>
                        @endif
                </div>
            </div>
        </div>
    </div>

    @endsection
