@extends('web.layout.master')

@section('title', 'Suggestion to edit Info')

@section('content')

{{--    <form action="{{route('handle.new_pending_post',['pendingPost'=> $pendingPost->id])}}" method="post" enctype="multipart/form-data">>--}}
{{--        @csrf--}}
        <div class="inputContainer">
            <div class="inputDataBox">
                <div class="mainHeader">
                    @if($pendingPost->status == 'Detained')
                        <h3>{{ __('forms.detained_header') }}</h3>

                    @endif
                    @if($pendingPost->status == 'Dead')
                        <h3>{{ __('forms.dead_header') }}</h3>

                    @endif
                    @if($pendingPost->status == 'Missing')
                        <h3>{{ __('forms.missing_header') }}</h3>

                    @endif
                    @if($pendingPost->status == 'Released')
                        <h3>{{ __('forms.released_header') }}</h3>

                    @endif


                </div>
                <div class="leftInfo">
                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>Name</p>
                        </div>
                        <div class="inputValue">
                            <input type="text" name="name" value="{{$pendingPost->name}}" autocomplete="off" />
                            <span class="text-danger">{{$errors->first('name')}}</span>

                        </div>
                    </div>
                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>Age</p>

                        </div>
                        <div class="inputValue">
                            <input type="number" id="age" name="age" value="{{$pendingPost->age}}" min="10" max="99" />
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
                                <option @if($pendingPost->gender == 'male') selected @endif value="Male">{{ __('forms.male') }}</option>
                                <option @if($pendingPost->gender == 'female') selected @endif value="Female">{{ __('forms.female') }}</option>
                                <option @if($pendingPost->gender == 'other') selected @endif value="Other">{{ __('forms.other') }}</option>
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
                                    <option @if($pendingPost->state_id == $state->id) selected @endif value="{{$state->id}}">{{$state->name}}</option>
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
                            <input type="text" value="{{$pendingPost->address}}"
                                   name="address"/>
                            <span class="text-danger">{{ $errors->first('address') }}</span>

                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>Occupation</p>

                        </div>
                        <div class="inputValue">
                            <input type="text" value="{{$pendingPost->occupation}}"
                                   name="occupation"/>
                            <span class="text-danger">{{$errors->first('occupation')}}</span>

                        </div>

                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>Organization</p>

                        </div>
                        <div class="inputValue">
                            <input
                                type="text"

                                name="organization_name"
                                value="{{$pendingPost->organization_name}}"
                            />
                            <span class="text-danger">{{$errors->first('organization_name')}}</span>

                        </div>
                    </div>


                    <div class="inputBox">
                        @if($pendingPost->status == 'Detained')
                            <div class="inputHeader">
                                <p> Detained Date</p>
                            </div>
                        @endif
                        @if($pendingPost->status == 'Dead')
                            <div class="inputHeader">
                                <p>Death Date</p>
                            </div>
                        @endif
                        @if($pendingPost->status == 'Missing')
                            <div class="inputHeader">
                                <p>Missed Date</p>
                            </div>
                        @endif
                        @if($pendingPost->status == 'Released')
                            <div class="inputHeader">
                                <p> Released Date</p>
                            </div>
                        @endif

                        @if($pendingPost->status == 'Released')
                            <div class="inputValue">
                                <input type="date" id="arrested_date" value="{{$pendingPost->released_date}}" name="released_date" />
                                <span class="text-danger">{{$errors->first('released_date')}}</span>
                            </div>
                        @else
                            <div class="inputValue">
                                <input type="date" id="arrested_date" value="{{$pendingPost->detained_date}}" name="detained_date" />
                                <span class="text-danger">{{$errors->first('detained_date')}}</span>
                            </div>
                        @endif
                    </div>
                    @if(isset($pendingPost->detained_date) && $pendingPost->status == 'Released')
                        <div class="inputBox">
                            <div class="inputHeader">
                                <p>Detained Date</p>

                            </div>
                            <div class="inputValue">
                                <input type="date" value="{{$pendingPost->detained_date}}"
                                       name="detained_date"/>
                                <span class="text-danger">{{$errors->first('detained_date')}}</span>

                            </div>

                        </div>
                    @endif
                    @if($pendingPost->status == 'Detained' || $pendingPost->status == 'Released')

                        <div class="inputBox">
                            <div class="inputHeader">
                                <p>Reason Of being arrested</p>

                            </div>
                            <div class="inputValue">
                                <input type="text" value="{{$pendingPost->reason_of_arrest}}"
                                       name="reason_of_arrest"/>
                                <span class="text-danger">{{$errors->first('reason_of_arrest')}}</span>

                            </div>

                        </div>
                    @endif
                    @if($pendingPost->status == 'Dead')
                        <div class="inputBox">
                            <div class="inputHeader">
                                <p>Reason of Death</p>

                            </div>
                            <div class="inputValue">
                                <input type="text" value="{{$pendingPost->reason_of_dead}}"
                                       name="reason_of_dead"/>
                                <span class="text-danger">{{$errors->first('reason_of_dead')}}</span>

                            </div>

                        </div>
                    @endif



                </div>

                <div class="rightInfo">

                    @if(($pendingPost->status == 'Detained' || $pendingPost->status =='Released'))

                        <div class="inputBox">
                            <div class="inputHeader">
                                <p>Prison</p>
                            </div>
                            <div class="inputValue">
                                <input type="text" value="{{$pendingPost->prison}}" name="prison" autocomplete="off" />
                                <span class="text-danger">{{$errors->first('prison')}}</span>

                            </div>
                        </div>
                    @endif
                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>Comment</p>

                        </div>
                        <div class="inputValue">
                            <textarea type="text" rows="6" name="comment" autocomplete="off" >{{$pendingPost->comment}}</textarea>
                            <span class="text-danger">{{$errors->first('comment')}}</span>

                        </div>
                    </div>

                    <div class="" style="margin-left: 15%;">
                        <div class="inputHeader">
                            <p>Profile</p>
                        </div>
                        <img
                            src="{{$pendingPost->profile_url}}"
                            alt="{{$pendingPost->name}}"
                        />

                    </div>



                    <h3>{{ __('forms.informer_header') }}</h3>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>Informer's Name</p>
                        </div>
                        <div class="inputValue">
                            <input type="text" value="{{$pendingPost->informant_name}}" name="informant_name" autocomplete="off" />
                            <span class="text-danger">{{$errors->first('informant_name')}}</span>

                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>Informer's Relationship with victim</p>
                        </div>
                        <div class="inputValue">
                            <input type="text" value="{{$pendingPost->informant_association_with_victim}}" name="informant_association_with_victim" autocomplete="off" />
                            <span class="text-danger">{{$errors->first('informant_association_with_victim')}}</span>

                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>Informer's Phone</p>

                        </div>
                        <div class="inputValue">
                            <input
                                type="number"
                                id="age"
                                value="{{$pendingPost->informant_phone}}"
                                name="informant_phone"
                            />
                            <span class="text-danger">{{$errors->first('informant_phone')}}</span>

                        </div>
                    </div>
                </div>

            </div>

            <div style="padding-top: 30px; padding-bottom: 30px; padding-left: 20%;" >
                <h4 class="text-danger">Please note that once you confirm or delete this data, the informer's data will be permanently deleted.</h4>
            </div>
            <div class="" style="margin-left: 30%">
                <form action="{{route('handle.new_pending_post',['pendingPost'=> $pendingPost->id])}}" method="post">
                    @csrf
                    <div class="confirmButton">
                        <input type="text" value="true" name="is_confirm" hidden>
                        <button type="submit">Confirm</button>
                    </div>
                </form>
                <form action="{{route('handle.new_pending_post',['pendingPost'=> $pendingPost->id])}}" method="post">
                    @csrf
                    <div class="deleteButton">
                        <input type="text" value="false" name="is_confirm" hidden>
                        <button type="submit">Reject</button>
                    </div>
                </form>
            </div>

        </div>
{{--    </form>--}}



@endsection
