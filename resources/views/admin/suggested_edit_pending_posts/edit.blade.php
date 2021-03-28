@extends('web.layout.master')

@section('title', 'Suggestion to edit Info')

@section('content')

{{--    <form action="#" enctype="multipart/form-data">--}}
        <div class="inputContainer">
            <div class="inputDataBox">
                <div class="mainHeader">
                    @if($pendingPost->status == 'Detained')
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
                                <option @if($pendingPost->gender == 'Male') selected @endif value="Male">{{ __('forms.male') }}</option>
                                <option @if($pendingPost->gender == 'Female') selected @endif value="Female">{{ __('forms.female') }}</option>
                                <option @if($pendingPost->gender == 'Other') selected @endif value="Other">{{ __('forms.other') }}</option>
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
{{--                            <select id="occupation" name="occupation">--}}
{{--                                <option value="" selected disabled>{{ __('forms.choose_occupation') }}</option>--}}

{{--                                <option @if($pendingPost->occupation == 'Student') selected @endif value="Student">{{ __('forms.student') }}</option>--}}
{{--                                <option @if($pendingPost->occupation == 'CDM Staff') selected @endif value="CDM Staff">{{ __('forms.cdm_staff') }}</option>--}}
{{--                                <option @if($pendingPost->occupation == 'Government Official') selected @endif value="Government Official">{{ __('forms.government_offical') }}</option>--}}
{{--                                <option @if($pendingPost->occupation == 'Political Party Member') selected @endif value="Political Party Member">{{ __('forms.political_party_member') }}</option>--}}
{{--                                <option @if($pendingPost->occupation == 'Journalist') selected @endif value="Journalist">{{ __('forms.journalist') }}</option>--}}
{{--                                <option @if($pendingPost->occupation == 'Civilian') selected @endif value="Civilian">{{ __('forms.civilian') }}</option>--}}
{{--                                <option @if($pendingPost->occupation == 'Other') selected @endif value="Other">{{ __('forms.other') }}</option>--}}
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
                                value="{{$pendingPost->organization_name}}"
                            />
                            <span class="text-danger">{{$errors->first('organization_name')}}</span>

                        </div>
                    </div>


                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>Date</p>

                        </div>
                        <div class="inputValue">
                            <input type="date" id="arrested_date" value="{{$pendingPost->detained_date}}" name="detained_date" />
                            <span class="text-danger">{{$errors->first('detained_date')}}</span>

                        </div>
                    </div>

                    @if($pendingPost->status == 'Detained')

                        <div class="inputBox">
                            <div class="inputHeader">
                                <p>Reason Of being arrested</p>

                            </div>
                            <div class="inputValue">
                                <input type="text" value="{{$pendingPost->reason_of_arrest}}"
                                       name="reason_of_arrest"/>
{{--                                <select id="township" name="reason_of_arrest">--}}
{{--                                    <option value="" selected disabled>{{ __('forms.choose_reason_of_arrest') }}</option>--}}
{{--                                    <option @if($pendingPost->reason_of_arrest == 'Protest') selected @endif  value="Protest">{{ __('forms.protestor') }}</option>--}}
{{--                                    <option @if($pendingPost->reason_of_arrest == 'Bystand') selected @endif value="Bystand">{{ __('forms.bystander') }}</option>--}}
{{--                                    <option @if($pendingPost->reason_of_arrest == 'Other') selected @endif value="Other">{{ __('forms.others') }}</option>--}}
{{--                                </select>--}}
                                <span class="text-danger">{{$errors->first('reason_of_arrest')}}</span>

                            </div>

                        </div>
                    @else
                        <div class="inputBox">
                            <div class="inputHeader">
                                <p>Reason of Death</p>

                            </div>
                            <div class="inputValue">
                                <input type="text" value="{{$pendingPost->reason_of_dead}}"
                                       name="reason_of_dead"/>
{{--                                <select id="township" name="reason_of_dead">--}}
{{--                                    <option value="" disabled>{{ __('forms.choose_reason_of_death') }}</option>--}}
{{--                                    <option @if($pendingPost->reason_of_dead == 'Gunshot') selected @endif  value="Gunshot">{{ __('forms.gunshot') }}</option>--}}
{{--                                    <option @if($pendingPost->reason_of_dead == 'Beaten') selected @endif value="Beaten">{{ __('forms.beaten') }}</option>--}}
{{--                                    <option @if($pendingPost->reason_of_dead == 'Other') selected @endif value="Other">{{ __('forms.others') }}</option>--}}
{{--                                </select>--}}
                                <span class="text-danger">{{$errors->first('reason_of_dead')}}</span>

                            </div>

                        </div>
                    @endif
                    @if($pendingPost->status == 'Detained')
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

                </div>

                <div class="rightInfo">


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
            <a style="padding-top: 30px; padding-bottom: 30px; padding-left: 50%;" target="_blank"  href="{{route('profile',['post'=> $pendingPost->post_id])}}">Click Here To See Original Post.</a>

            <div style="padding-top: 30px; padding-bottom: 30px; padding-left: 20%;" >
                <h4 class="text-danger">Please note that once you confirm or delete this data, the informer's data will be permanently deleted.</h4>
            </div>
            <div class="" style="margin-left: 30%">
                <form action="{{route('handle.suggested_edit_pending_post',['pendingPost'=> $pendingPost->id])}}" method="post">
                    @csrf
                    <div class="confirmButton">
                        <input type="text" value="true" name="is_confirm" hidden>
                        <button type="submit">Confirm</button>
                    </div>
                </form>
                <form action="{{route('handle.suggested_edit_pending_post',['pendingPost'=> $pendingPost->id])}}" method="post">
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
