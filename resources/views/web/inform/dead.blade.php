@extends('web.layout.master')

@section('title', 'Dead Info')

@section('content')

    <form action="{{ route('store.inform') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="inputContainer">
            <div class="inputDataBox">
                <div class="mainHeader">
                    <h3>{{ __('forms.dead_header') }}</h3>
                </div>
                <div>
                    <span>{{__('forms.dead_disclaimer')}}</span>
                </div>
                <div class="leftInfo">

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('forms.name_label') }} <span>*</span></p>
                        </div>
                        <div class="inputValue">
                            <input
                                value="{{old('name')}}"
                                type="text" placeholder="{{ __('forms.name_placeholder') }}" name="name"
                                autocomplete="off"/>
                            <span class="text-danger">{{ $errors->first('name') }}</span>

                        </div>
                    </div>
                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('forms.age_label') }} <span>*</span></p>
                        </div>
                        <div class="inputValue">
                            <input
                                value="{{old('age')}}"
                                type="number" id="age" name="age" min="10" max="99"
                                placeholder="{{ __('forms.age_placeholder') }}"/>
                            <span class="text-danger">{{ $errors->first('age') }}</span>

                        </div>
                    </div>
                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('forms.gender_label') }} <span>*</span></p>
                        </div>

                        <div class="inputValue">
                            <select data-value="{{old('gender')}}" id="gender" name="gender">
                                <option value="" selected disabled>{{ __('forms.gender_title') }}</option>
                                <option value="Male">{{ __('forms.male') }}</option>
                                <option value="Female">{{ __('forms.female') }}</option>
                                <option value="Other">{{ __('forms.other') }}</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('gender') }}</span>


                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('forms.state_label') }} <span>*</span></p>
                        </div>
                        <div class="inputValue">
                            <select data-value="{{old('state_id')}}" id="state" name="state_id" title="State">
                                <option value="" disabled selected>{{ __('forms.state_title') }}</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('state_id') }}</span>

                        </div>
                    </div>


                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('forms.address_label') }} <span>*</span></p>
                        </div>
                        <div class="inputValue">
                            <input
                                value="{{old('address')}}"
                                type="text" placeholder="{{ __('forms.address_placeholder') }}"
                                name="address"/>
                            <span class="text-danger">{{ $errors->first('address') }}</span>


                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('forms.occupation_label') }} <span>*</span></p>
                        </div>
                        <div class="inputValue">

                            <input
                                value="{{old('occupation')}}"
                                type="text" placeholder="{{ __('forms.occupation_placeholder') }}"
                                name="occupation"/>
{{--                            @include('components.form.occupation_selector')--}}
                            <span class="text-danger">{{ $errors->first('occupation') }}</span>

                        </div>

                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('forms.association_label') }}</p>
                        </div>
                        <div class="inputValue">
                            <input
                                value="{{old('organization_name')}}"
                                type="text" placeholder="{{ __('forms.association_placeholder') }}"
                                name="organization_name"/>
                            <span class="text-danger">{{ $errors->first('organization_name') }}</span>

                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('forms.death_date') }} <span>*</span></p>
                        </div>
                        <div class="inputValue">
                            <input
                                value="{{old('detained_date')}}"
                                type="date" id="arrested_date" name="detained_date"/>
                            <span class="text-danger">{{ $errors->first('detained_date') }}</span>

                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('forms.dead_reason_label') }} <span>*</span></p>
                        </div>
                        <div class="inputValue">
                            <input
                                value="{{old('reason_of_dead')}}"
                                type="text" placeholder="{{ __('forms.dead_reason_placeholder') }}"
                                name="reason_of_dead"/>

                            <span class="text-danger">{{ $errors->first('reason_of_dead') }}</span>

                        </div>

                    </div>
                </div>

                <div class="rightInfo">

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('forms.comment_label') }} </p>
                        </div>
                        <div class="inputValue">
                            <textarea type="text" rows="6" placeholder="{{ __('forms.comment_placeholder') }}"
                                name="comment" autocomplete="off"></textarea>
                            <span class="text-danger">{{ $errors->first('comment') }}</span>

                        </div>
                    </div>

                    <div class="inputBoxImg">
                        <label for="myfile">{{__('forms.photo_label')}}  <span>*</span></label>
                        <input
                            value="{{old('photo')}}"
                            type="file" id="myFile" name="photo"/>
                        <span class="text-danger">{{ $errors->first('photo') }}</span>
                    </div>


                    <h3>{{ __('forms.informer_header') }}</h3>
                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('forms.informer_name_label') }} <span>*</span></p>
                        </div>
                        <div class="inputValue">
                            <input
                                value="{{old('informant_name')}}"
                                type="text" placeholder="{{ __('forms.name_placeholder') }}" name="informant_name"
                                autocomplete="off"/>
                            <span class="text-danger">{{ $errors->first('informant_name') }}</span>

                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('forms.relationship_label') }} <span>*</span></p>
                        </div>
                        <div class="inputValue">
                            <select
                                data-value="{{old('informant_association_with_victim')}}"
                                id="informant_assoication" name="informant_association_with_victim">
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
                            <p>{{ __('forms.informer_phone_label') }} <span>*</span></p>
                        </div>
                        <div class="inputValue">
                            <input
                                value="{{old('informant_phone')}}"
                                type="number" id="age" placeholder="{{ __('forms.informer_phone_placeholder') }}"
                                name="informant_phone"/>
                            <span class="text-danger">{{ $errors->first('informant_phone') }}</span>

                        </div>
                    </div>
                </div>
            </div>

            <div class="submitButton">
                <input type="text" value="dead" name="status" hidden>

                <button id="submit" type="submit">{{ __('forms.submit') }}</button>
            </div>
        </div>
    </form>

    @include('web.layout.success_msg')

@endsection

@section('script')
    <script src="{{asset('web/js/form.js')}}"></script>
    <script type="text/javascript" defer>
        selectValue($('#gender'));
        selectValue($('#occupation'));
        selectValue($('#inform_association'));
        selectValue($('#comment'));
        selectValue($('#reason_of_dead'))
        selectValue($('#state'))
    </script>
@endsection
