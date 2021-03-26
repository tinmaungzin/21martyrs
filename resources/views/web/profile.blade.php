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

    {{-- <div class="profileBody">
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
                        <h3>{{$post->name}}</h3>
                        <span>{{$post->age}} yrs , {{$post->gender}}</span>
                    </div>
                    <div class="profileStatus">
                        <h5>Status</h5>
                        <p>{{$post->status}}, {{$post->detained_date->diffForHumans()}}</p>
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
                            <p>{{$post->occupation}}</p>
                        </div>
                        <div class="profileDetail">
                            <p>State/Region</p>
                            <p>{{$post->state->name}}</p>
                        </div>
                        <div class="profileDetail">
                            <p>Township/Address</p>
                            <p>{{$post->address}}</p>
                        </div>

                        <div class="profileDetail">
                            <p>Arrested Date</p>
                            <p>{{$post->detained_date}}</p>
                        </div>
                        <div class="profileDetail">
                            <p>Reason of being arrested</p>
                            <p>{{$post->reason_of_arrest}}</p>
                        </div>
                    @if(isset($post->prison))
                        <div class="profileDetail">
                            <p>Prison</p>
                            <p>{{$post->prison}}</p>
                        </div>
                    @endif
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
    </div> --}}


    <div class="profileBody">
        <div class="container">
            <div class="row">
                <div class="TopSection">
                    <div class="profilePicture">
                        <img
                            src="{{Str::of($post->profile_url)->isEmpty() ? asset('web/img/default-profile.jpg'): $post->profile_url}}"
                            alt="{{$post->name}}"
                        />
                    </div>
                    <div class="profileInfo">
                        <h3>{{$post->name}}</h3>
                        <span>{{App\Utility\StringUtility::isEmpty($post->age) ? __('ui.age_unknown'): "{$post->age} years old"}} , {{$post->gender}}</span>
                        <div class="profileStatus">
                            <h4>Status</h4>
                            <p>{{$post->status}}, {{$post->detained_date->diffForHumans()}}</p>
                        </div>
                    </div>

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="bottomWarp">
                    <div class="bottomSection">
                        <h4>{{$post->status == 'detained' ? __('ui.arrestee_info'): __('ui.dead_person_info')}}</h4>
                        <div class="profileDetail">
                            <p>{{__('ui.state')}}:</p>
                            <p class="DetailText">{{is_null($post->state) ? __('ui.state_unknown'):$post->state->name}}</p>
                        </div>
                        <div class="profileDetail">
                            <p>{{__('ui.address')}}:</p>
                            <p class="DetailText">
                                {{ViewUtility::displayNullableText($post->address)}}</p>
                        </div>
                        <div class="profileDetail">
                            <p>{{__('ui.occupation')}}:</p>
                            <p class="DetailText">{{ViewUtility::displayNullableText($post->occupation)}}</p>
                        </div>
                        <div class="profileDetail">
                            <p>{{__('ui.association')}}:</p>
                            <p class="DetailText">{{ViewUtility::displayNullableText($post->organization_name)}}</p>
                        </div>

                        <div class="profileDetail">
                            <p>{{$post->status =='detained' ? __('ui.arrested_date'): __('ui.death_date')}}:</p>
                            <p class="DetailText">{{is_null($post->detained_date)? __('ui.unknown'): ViewUtility::displayDate($post->detained_date)
                            }}</p>
                        </div>
                        @if($post->status == 'Detained')
                            <div class="profileDetail">
                                <p>{{__('ui.arrested_reason')}}
                                    :</p>
                                <p class="DetailText">{{$post->reason_of_arrest}}</p>
                            </div>
                        @else
                            <div class="profileDetail">
                                <p>{{__('ui.reason_of_death')}}:</p>
                                <p class="DetailText">{{$post->reason_of_dead}}</p>
                            </div>
                        @endif
                        @if(isset($post->prison))
                            <div class="profileDetail">
                                <p>Prison:</p>
                                <p class="DetailText">{{ViewUtility::displayNullableText($post->prison)}}</p>
                            </div>
                        @endif
                        @if(isset($post->comment))
                            <div class="profileDetail">
                                <p>{{__('ui.comment_by_informer')}}:</p>
                                <p class="DetailText">{{$post->comment}}</p>
                            </div>
                        @endif
                        <div class="editButton">
                            @if($post->status == 'Detained')
                                <a href="{{route('form.edit.detained',['post'=> $post->id])}}">
                                    <button>{{__('ui.suggest_edit')}}
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </a>
                            @endif
                            @if($post->status == 'Dead')
                                <a href="{{route('form.edit.dead',['post'=> $post->id])}}">
                                    <button>{{__('ui.suggest_edit')}}
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </a>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    @include('web.layout.success_msg')


@endsection
