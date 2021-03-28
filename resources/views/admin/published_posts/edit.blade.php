@extends('web.layout.master')

@section('title', 'Suggestion to edit Info')

@section('content')

    <form action="{{route('handle.new_pending_post',['pendingPost'=> $post->id])}}" method="post" enctype="multipart/form-data">>
        @csrf
        <div class="inputContainer">
            <div class="inputDataBox">
                <div class="mainHeader">
                    @if($post->status == 'detained')
                        <h3>{{ __('forms.detained_header') }}</h3>

                    @else
                        <h3>{{ __('forms.dead_header') }}</h3>

                    @endif


                </div>
                <div class="leftInfo">
                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>Name</p>
                        </div>
                        <div class="inputValue">
                            <input type="text" name="name" value="{{$post->name}}" autocomplete="off" />
                            <span class="text-danger">{{$errors->first('name')}}</span>

                        </div>
                    </div>
                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>Age</p>

                        </div>
                        <div class="inputValue">
                            <input type="number" id="age" name="age" value="{{$post->age}}" min="10" max="99" />
                            <span class="text-danger">{{$errors->first('age')}}</span>

                        </div>
                    </div>
                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>Gender</p>

                        </div>

                        <div class="inputValue">
                            <select id="gender" name="gender">
                                <option value="" disabled>{{ __('forms.choose_gender') }}</option>
                                <option @if($post->gender == 'Male') selected @endif value="Male">{{ __('forms.male') }}</option>
                                <option @if($post->gender == 'Female') selected @endif value="Female">{{ __('forms.female') }}</option>
                                <option @if($post->gender == 'Other') selected @endif value="Other">{{ __('forms.other') }}</option>
                            </select>
                            <span class="text-danger">{{$errors->first('gender')}}</span>


                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>State</p>

                        </div>
                        <div class="inputValue">
                            <select id="state" name="state_id" title="State">
                                <option value="" disabled selected>{{ __('forms.choose_state') }}</option>
                                @foreach($states as $state)
                                    <option @if($post->state_id == $state->id) selected @endif value="{{$state->id}}">{{$state->name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{$errors->first('state_id')}}</span>

                        </div>
                    </div>


                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>Town/ Township</p>
                        </div>
                        <div class="inputValue">
                            <input type="text" value="{{$post->address}}"
                                   name="address"/>
                            <span class="text-danger">{{ $errors->first('address') }}</span>

                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>Occupation</p>

                        </div>
                        <div class="inputValue">
                            <input type="text" value="{{$post->occupation}}"
                                   name="occupation"/>
                            {{--                            <select id="occupation" name="occupation">--}}
                            {{--                                <option value="" selected disabled>{{ __('forms.choose_occupation') }}</option>--}}

                            {{--                                <option @if($post->occupation == 'Student') selected @endif value="Student">{{ __('forms.student') }}</option>--}}
                            {{--                                <option @if($post->occupation == 'CDM Staff') selected @endif value="CDM Staff">{{ __('forms.cdm_staff') }}</option>--}}
                            {{--                                <option @if($post->occupation == 'Government Official') selected @endif value="Government Official">{{ __('forms.government_offical') }}</option>--}}
                            {{--                                <option @if($post->occupation == 'Political Party Member') selected @endif value="Political Party Member">{{ __('forms.political_party_member') }}</option>--}}
                            {{--                                <option @if($post->occupation == 'Journalist') selected @endif value="Journalist">{{ __('forms.journalist') }}</option>--}}
                            {{--                                <option @if($post->occupation == 'Civilian') selected @endif value="Civilian">{{ __('forms.civilian') }}</option>--}}
                            {{--                                <option @if($post->occupation == 'Other') selected @endif value="Other">{{ __('forms.other') }}</option>--}}
                            {{--                            </select>--}}
                            <span class="text-danger">{{$errors->first('occupation')}}</span>

                        </div>
                        {{--                    <div class="inputValue" style="display: none">--}}
                        {{--                        <input type="text" placeholder="please specify" name="name" />--}}
                        {{--                    </div>--}}
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>Organization</p>

                        </div>
                        <div class="inputValue">
                            <input
                                type="text"

                                name="organization_name"
                                value="{{$post->organization_name}}"
                            />
                            <span class="text-danger">{{$errors->first('organization_name')}}</span>

                        </div>
                    </div>


                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>Date</p>

                        </div>
                        <div class="inputValue">
                            <input type="date" id="arrested_date" value="{{$post->detained_date}}" name="detained_date" />
                            <span class="text-danger">{{$errors->first('detained_date')}}</span>

                        </div>
                    </div>

                    @if($post->status == 'Detained')

                        <div class="inputBox">
                            <div class="inputHeader">
                                <p>Reason Of being arrested</p>

                            </div>
                            <div class="inputValue">
                                <input type="text" value="{{$post->reason_of_arrest}}"
                                       name="reason_of_arrest"/>
                                <span class="text-danger">{{$errors->first('reason_of_arrest')}}</span>

                            </div>

                        </div>
                    @else
                        <div class="inputBox">
                            <div class="inputHeader">
                                <p>Reason of Death</p>

                            </div>
                            <div class="inputValue">
                                <input type="text" value="{{$post->reason_of_dead}}"
                                       name="reason_of_dead"/>
                                <span class="text-danger">{{$errors->first('reason_of_dead')}}</span>

                            </div>

                        </div>
                    @endif
                    @if(isset($post->prison))
                        <div class="inputBox">
                            <div class="inputHeader">
                                <p>Prison</p>
                            </div>
                            <div class="inputValue">
                                <input type="text" value="{{$post->prison}}" name="prison" autocomplete="off" />
                                <span class="text-danger">{{$errors->first('prison')}}</span>

                            </div>
                        </div>
                    @endif

                </div>

                <div class="rightInfo">


                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>Comment</p>

                        </div>
                        <div class="inputValue">
                            <textarea type="text" rows="6" name="comment" autocomplete="off" >{{$post->comment}}</textarea>
                            <span class="text-danger">{{$errors->first('comment')}}</span>

                        </div>
                    </div>

                    <div class="" style="margin-left: 15%;">
                        <div class="inputHeader">
                            <p>Profile</p>
                        </div>
                        <img
                            src="{{$post->profile_url}}"
                            alt="{{$post->name}}"
                        />

                    </div>





                </div>

            </div>

            <div class="" style="margin-left: 40%">
                <div class="confirmButton">
                    <input type="text" value="true" name="is_confirm" hidden>
                    <button type="submit">Update</button>
                </div>
            </div>

        </div>
    </form>



@endsection
