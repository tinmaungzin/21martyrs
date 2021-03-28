@extends('web.layout.master')

@section('title', 'Suggestion to edit Info')

@section('content')

    <form action="{{route('edit.inform',['post' => $post->id])}}" method="post" enctype="multipart/form-data">>
        @csrf
        <div class="inputContainer">
            <div class="inputDataBox">
                <div class="mainHeader">
                    <h3>{{ __('forms.detained_header') }}</h3>


                </div>
                <div class="headerText">
                    <span>{{__('forms.disclaimer_edit')}}</span>
                </div>
                <div class="leftInfo">

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('forms.name_label') }}</p>

                        </div>
                        <div class="inputValue">
                            <input type="text" placeholder="{{ __('forms.name_placeholder') }}" name="name" value="{{$post->name}}" autocomplete="off" />

                            <span class="text-danger">{{$errors->first('name')}}</span>

                        </div>
                    </div>
                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('forms.age_label') }}</p>

                        </div>
                        <div class="inputValue">
                            <input type="number" id="age" name="age" value="{{$post->age}}" min="10" max="99" placeholder="{{ __('forms.age_placeholder') }}" />

                            <span class="text-danger">{{$errors->first('age')}}</span>

                        </div>
                    </div>
                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('forms.gender_label') }}</p>


                        </div>

                        <div class="inputValue">
                            <select id="gender" name="gender">
                                <option value="" selected disabled>{{ __('forms.choose_gender') }}</option>
                                <option @if($post->gender == 'Male') selected @endif value="Male">{{ __('forms.male') }}</option>
                                <option @if($post->gender == 'Female') selected @endif value="Female">{{ __('forms.female') }}</option>
                                <option @if($post->gender == 'Other') selected @endif value="Other">{{ __('forms.other') }}</option>

                            </select>
                            <span class="text-danger">{{$errors->first('gender')}}</span>


                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('forms.state_label') }}</p>

                        </div>
                        <div class="inputValue">
                            <select id="state" name="state_id" title="State">
                                <option value="" disabled selected>{{ __('forms.state_title') }}</option>

                                @foreach($states as $state)
                                <option @if($post->state_id == $state->id) selected @endif value="{{$state->id}}">{{$state->name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{$errors->first('state_id')}}</span>

                        </div>
                    </div>


                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('forms.address_label') }}</p>
                        </div>
                        <div class="inputValue">
                            <input type="text" value="{{$post->address}}" placeholder="{{ __('forms.address_placeholder') }}"
                                   name="address"/>
                            <span class="text-danger">{{ $errors->first('address') }}</span>


                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>
                                {{ __('forms.occupation_label') }}
                            </p>
                        </div>
                        <div class="inputValue">
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
                            <input
                                value="{{$post->occupation}}"
                                type="text" placeholder="{{ __('forms.occupation_placeholder') }}"
                                name="occupation"/>
                            <span class="text-danger">{{$errors->first('occupation')}}</span>

                        </div>
    {{--                    <div class="inputValue" style="display: none">--}}
    {{--                        <input type="text" placeholder="please specify" name="name" />--}}
    {{--                    </div>--}}
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('forms.association_label') }}</p>


                        </div>
                        <div class="inputValue">
                            <input
                                type="text"
                                placeholder="{{ __('forms.association_placeholder') }}"

                                name="organization_name"
                                value="{{$post->organization_name}}"
                            />
                            <span class="text-danger">{{$errors->first('organization_name')}}</span>

                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('forms.detained_date') }}</p>
                        </div>
                        <div class="inputValue">
                            <input type="date" id="arrested_date" value="{{$post->detained_date}}" name="detained_date" />
                            <span class="text-danger">{{$errors->first('detained_date')}}</span>

                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('forms.detained_reason_label') }}</p>

                        </div>
                        <div class="inputValue">
{{--                            <select id="township" name="reason_of_arrest">--}}
{{--                                <option value="" selected disabled>{{ __('forms.choose_reason_of_arrest') }}</option>--}}
{{--                                <option @if($post->reason_of_arrest == 'Protest') selected @endif  value="Protest">{{ __('forms.protestor') }}</option>--}}
{{--                                <option @if($post->reason_of_arrest == 'Bystand') selected @endif value="Bystand">{{ __('forms.bystander') }}</option>--}}
{{--                                <option @if($post->reason_of_arrest == 'Other') selected @endif value="Other">{{ __('forms.others') }}</option>--}}

{{--                            </select>--}}
                            <input
                                value="{{$post->reason_of_arrest}}"
                                type="text" placeholder="{{ __('forms.detained_reason_placeholder') }}"
                                name="reason_of_arrest"/>
                            <span class="text-danger">{{$errors->first('reason_of_arrest')}}</span>

                        </div>

                    </div>
            </div>

            <div class="rightInfo">
                <div class="inputBox">
                    <div class="inputHeader">
                        <p>{{ __('forms.prison_label') }}</p>
                    </div>
                    <div class="inputValue">
                        <input type="text" value="{{$post->prison}}" placeholder="{{ __('forms.prison_placeholder') }}" name="prison" autocomplete="off" />

                        <span class="text-danger">{{$errors->first('prison')}}</span>

                    </div>
                </div>

                <div class="inputBox">
                    <div class="inputHeader">
                        <p>{{ __('forms.comment_label') }}</p>

                    </div>
                    <div class="inputValue">
                        <textarea type="text" rows="6" placeholder="{{ __('forms.comment_placeholder') }}" name="comment" autocomplete="off" >{{$post->comment}}</textarea>

                        <span class="text-danger">{{$errors->first('comment')}}</span>

                    </div>
                </div>

                <div class="inputBoxImg">
                    <label for="myfile">{{__('forms.photo_label')}}</label>

                    <input type="file" id="myFile" name="photo" />
                    <span class="text-danger">{{$errors->first('photo')}}</span>

                </div>



                <h3>{{ __('forms.informer_header') }}</h3>

                <div class="inputBox">
                    <div class="inputHeader">
                        <p>{{ __('forms.informer_name_label') }}<span>*</span></p>
                    </div>
                    <div class="inputValue">
                        <input type="text" placeholder="{{ __('forms.name_placeholder') }}" name="informant_name" autocomplete="off" />

                        <span class="text-danger">{{$errors->first('informant_name')}}</span>

                    </div>
                </div>

                <div class="inputBox">
                    <div class="inputHeader">
                        <p>{{ __('forms.relationship_label') }}<span>*</span></p>
                    </div>
                    <div class="inputValue">
                        <select id="township" name="informant_association_with_victim">
                            <option value="" selected disabled>{{ __('forms.choose_relationship') }}</option>
                            <option value="Family">{{__('forms.family')}}</option>
                            <option value="Friend">{{__('forms.friend')}}</option>
                            <option value="Social Media">{{__('forms.social')}}</option>
                            <option value="Witness">{{__('forms.witness')}}</option>
                        </select>

                        <span class="text-danger">{{ $errors->first('informant_association_with_victim') }}</span>

                    </div>
                </div>

                <div class="inputBox">
                    <div class="inputHeader">
                        <p>{{ __('forms.informer_phone_label') }}<span>*</span></p>


                    </div>
                    <div class="inputValue">
                        <input
                            type="number"
                            id="age"
                            placeholder="{{ __('forms.informer_phone_placeholder') }}"

                            name="informant_phone"
                        />
                        <span class="text-danger">{{$errors->first('informant_phone')}}</span>

                    </div>
                </div>
            </div>
{{--                <div class="inputCheckbox">--}}
{{--                    <input type="checkbox" name="terms" id="terms">--}}
{{--                    <label for="terms" >Thank you for your information. Please note that we will verify and update as soon as we can.</label>--}}
{{--                </div>--}}
        </div>

            <div class="submitButton">
                <input type="text" value="detained" name="status" hidden>

                <button id="submit" type="submit">{{ __('forms.submit') }}</button>
            </div>
        </div>
    </form>

{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            if($("#terms").is(':checked')) $("#submit").prop( "disabled", false );--}}
{{--            else $("#submit").prop( "disabled", true );--}}

{{--            $('#terms').click(function(){--}}
{{--                if($("#terms").is(':checked')) $("#submit").prop( "disabled", false );--}}
{{--                else $("#submit").prop( "disabled", true );--}}
{{--            });--}}

{{--        })--}}
{{--    </script>--}}
    @include('web.layout.success_msg')



@endsection
