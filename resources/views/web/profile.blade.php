@extends('web.layout.master')

@section('title', 'Profile')

@section('content')

{{-- <div class="profileBody">
            <div class="container">
            <div class="profilePicture">
                @if(!is_null($post->profile_url) )
                    <img
                         src="{{$post->profile_url}}"
                         alt="{{$post->name}}"
                    />

                @else
                    <img
                        src="{{asset('web/img/default-profile.jpg')}}"
                        alt="{{$post->name}}"
                    />
                    @endif

            </div>
            <div class="profileDetail">
                <h3>Arrestee's Info</h3>
                <div class="DetailBox">

                    <div class="profileDetailBox">
                        <div class="profileHeaders">
                            <span>Name:</span>
                        </div>
                        <div class="profileValues">
                            <span>{{$post->name}}</span>
                        </div>
                    </div>
                    <div class="profileDetailBox">
                        <div class="profileHeaders">
                            <span>Age:</span>
                        </div>
                        <div class="profileValues">
                            <span>{{$post->age}}</span>
                        </div>
                    </div>
    
    
    
                    <div class="profileDetailBox">
                        <div class="profileHeaders">
                            <span>Gender:</span>
                        </div>
                        <div class="profileValues">
                            <span>{{ucfirst($post->gender)}}</span>
                        </div>
                    </div>
                    <div class="profileDetailBox">
                        <div class="profileHeaders">
                            <span>State/Region:</span>
                        </div>
                        <div class="profileValues">
                            <span>{{$post->state->name}}</span>
                        </div>
                    </div>
                    <div class="profileDetailBox">
                        <div class="profileHeaders">
                            <span>Township/Address:</span>
                        </div>
                        <div class="profileValues">
                            <span>{{$post->address}}</span>
                        </div>
                    </div>
                    <div class="profileDetailBox">
                        <div class="profileHeaders">
                            <span>Arrested Date:</span>
                        </div>
                        <div class="profileValues">
                            <span>{{$post->detained_date}}</span>
                        </div>
                    </div>
                    <div class="profileDetailBox">
                        <div class="profileHeaders">
                            <span>Occupation:</span>
                        </div>
                        <div class="profileValues">
                            <span>{{$post->occupation}}</span>
                        </div>
                    </div>
                    @if($post->status == 'detained')
                    <div class="profileDetailBox">
                        <div class="profileHeaders">
                            <span>Reason of being arrested:</span>
                        </div>
                        <div class="profileValues">
                            <span>{{$post->reason_of_arrest}}</span>
                        </div>
                    </div>
                        @endif
                    @if($post->status == 'dead')
                        <div class="profileDetailBox">
                            <div class="profileHeaders">
                                <span>Reason of being Dead:</span>
                            </div>
                            <div class="profileValues">
                                <span>{{$post->reason_of_dead}}</span>
                            </div>
                        </div>
                        @endif
    
                    @if(isset($post->prison))
                    <div class="profileDetailBox">
                        <div class="profileHeaders">
                            <span>Prison:</span>
                        </div>
                        <div class="profileValues">
                            <span>{{$post->prison}}</span>
                        </div>
                    </div>
                    @endif
                    <div class="profileDetailBox">
                        <div class="profileHeaders">
                            <span>Status:</span>
                        </div>
                        <div class="profileValues">
                            <span>{{$post->status}}</span>
                        </div>
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
    </div> --}}

    <div class="profileBody">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="profilePicture">
                        @if(!is_null($post->profile_url) )
                            <img
                                 src="{{$post->profile_url}}"
                                 alt="{{$post->name}}"
                            />
        
                        @else
                            <img
                                src="{{asset('web/img/default-profile.jpg')}}"
                                alt="{{$post->name}}"
                            />
                            @endif
                    </div>
                    <hr>
                </div>
                <div class="col-md-5 col-md-offset-1">
                    <div class="profileInfo">
                        <h3>Ko Yin Maung Latt</h3>
                        <span>23 yrs , Male</span>
                    </div>
                    <div class="profileStatus">
                        <h5>Status</h5>
                        <p>Detained 40days ago</p>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                  <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod reiciendis voluptatibus consectetur, velit a exercitationem sit quis laudantium molestiae, dicta eos distinctio hic consequatur doloremque, temporibus illum. Cupiditate, quae fugit.</p>
                </div>
                <div class="col-md-5 col-md-offset-1">
                        <h4>Arrestee Info</h4>
                        <div class="profileDetail">
                            <p>Occupation</p>
                            <p>Journalist</p>
                        </div>
                        <div class="profileDetail">
                            <p>State/Region</p>
                            <p>Chin</p>
                        </div>
                        <div class="profileDetail">
                            <p>Township/Address</p>
                            <p>Chin ,No (5),shinDawGone </p>
                        </div>
                    
                        <div class="profileDetail">
                            <p>Arrested Date</p>
                            <p>Chin</p>
                        </div>
                        <div class="profileDetail">
                            <p>Reason of being arrested</p>
                            <p>Protest</p>
                        </div>
                        <div class="profileDetail">
                            <p>Prison</p>
                            <p>Insein</p>
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
    </div>

    @endsection
