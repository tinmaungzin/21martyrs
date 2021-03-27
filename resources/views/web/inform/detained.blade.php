@extends('web.layout.master')

@section('title', 'Detained Info')

@section('content')

    <form action="{{ route('store.detained') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="inputContainer">
            <div class="inputDataBox">
                <div class="mainHeader">
                    <h3>{{ __('ui.arrestee_info') }}</h3>
                </div>
                <div class="leftInfo">

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.name') }}</p>
                        </div>
                        <div class="inputValue">
                            <input type="text" id="name" placeholder="{{ __('ui.name_placeholder') }}" name="name"
                                   autocomplete="off"
                                   value="{{old('name')}}"
                            />

                            <span class="text-danger">{{ $errors->first('name') }}</span>

                        </div>
                    </div>


                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.age') }}</p>
                        </div>
                        <div class="inputValue">
                            <input
                                value="{{old('age')}}"
                                type="number" id="age" name="age" min="10" max="99"
                                placeholder="{{ __('ui.age_placeholder') }}"/>
                            <span class="text-danger">{{ $errors->first('age') }}</span>

                        </div>
                    </div>
                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.gender') }}</p>
                        </div>

                        <div class="inputValue">
                            <select id="gender" data-value="{{old('gender')}}" name="gender">
                                <option value="" selected disabled>{{ __('ui.choose_gender') }}</option>
                                <option value="Male">{{ __('ui.male') }}</option>
                                <option value="Female">{{ __('ui.female') }}</option>
                                <option value="Other">{{ __('ui.other') }}</option>

                            </select>
                            <span class="text-danger">{{ $errors->first('gender') }}</span>


                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.arresstee_state') }}</p>
                        </div>
                        <div class="inputValue">
                            <select id="state"
                                    data-value="{{old('state_id')}}"
                                    name="state_id" title="State">
                                <option value="" disabled selected>{{ __('ui.choose_state') }}</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('state_id') }}</span>

                        </div>
                    </div>


                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.arrestee_township') }}</p>
                        </div>
                        <div class="inputValue">
                            <input
                                value="{{old('address')}}"
                                type="text" placeholder="{{ __('ui.arrestee_township_placeholder') }}"
                                name="address"/>
                            <span class="form-text text-danger">{{ $errors->first('address') }}</span>
                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>
                                {{ __('ui.arrestee_occupation') }}
                            </p>
                        </div>
                        <div class="inputValue">
                            <select
                                data-value="{{old('occupation')}}"
                                id="occupation" name="occupation">
                                <option value="" selected disabled>{{ __('ui.choose_occupation') }}</option>
                                <option value="Student">{{ __('ui.student') }}</option>
                                <option value="CDM Staff">{{ __('ui.cdm_staff') }}</option>
                                <option value="Government Official">{{ __('ui.government_offical') }}</option>
                                <option value="Political Party Member">{{ __('ui.political_party_member') }}</option>
                                <option value="Journalist">{{ __('ui.journalist') }}</option>
                                <option value="Civilian">{{ __('ui.civilian') }}</option>
                                <option value="Other">{{ __('ui.other') }}</option>
                            </select>
                            {{--                            <span class="form-ttext-danger"></span>--}}
                            <x-form.form-text message="{{ $errors->first('occupation') }}"
                                              type="danger"></x-form.form-text>

                        </div>
                        {{--                         <div class="inputValue" style="display: none">--}}
                        {{--                         <input type="text" placeholder="please specify" name="name" />--}}
                        {{--                         </div> --}}
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.association') }}</p>
                        </div>
                        <div class="inputValue">
                            <input
                                value="{{old('organization_name')}}"
                                type="text" placeholder="{{ __('ui.arresstee_assoication_placholder') }}"
                                name="organization_name"/>
                            <span class="text-danger">{{ $errors->first('organization_name') }}</span>

                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.arrested_date') }}</p>
                        </div>
                        <div class="inputValue">
                            <input type="date" id="arrested_date" name="detained_date"/>
                            <span class="text-danger">{{ $errors->first('detained_date') }}</span>

                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.arrested_reason') }}</p>
                        </div>
                        <div class="inputValue">
                            <select data-value="{{old('reason_of_arrest')}}" id="reason_of_arrest"
                                    name="reason_of_arrest">
                                <option value="" selected disabled>{{ __('ui.choose_reason_of_arrest') }}</option>
                                <option value="Protest">{{ __('ui.protestor') }}</option>
                                <option value="Bystand">{{ __('ui.bystander') }}</option>
                                <option value="Other">{{ __('ui.others') }}</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('reason_of_arrest') }}</span>

                        </div>
                        {{--                        <div class="inputValue" style="display: none">--}}
                        {{--                            <input type="text" placeholder="{{ __('ui.please_specify') }}" name="name" />--}}
                        {{--                        </div>--}}
                    </div>
                </div>

                <div class="rightInfo">
                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.prison') }}</p>
                        </div>
                        <div class="inputValue">
                            <input type="text" placeholder="{{ __('ui.prison_placeholder') }}" name="prison"
                                   autocomplete="off"/>
                            <span class="text-danger">{{ $errors->first('prison') }}</span>

                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.arrestee_comment') }}</p>
                        </div>
                        <div class="inputValue">
                            <textarea type="text" rows="6" placeholder="{{ __('ui.arrestee_comment_placeholder') }}"
                                      name="comment" autocomplete="off"></textarea>
                            <span class="text-danger">{{ $errors->first('comment') }}</span>

                        </div>
                    </div>

                    <div class="inputBoxImg">
                        <label for="myfile">Photo</label>
                        <input type="file" id="myFile" name="photo"/>
                        <span class="text-danger">{{ $errors->first('photo') }}</span>
                    </div>


                    <h3>{{ __('ui.informer_info') }}</h3>
                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.informer_name') }}</p>
                        </div>
                        <div class="inputValue">
                            <input
                                value="{{old('informant_name')}}"
                                type="text" placeholder="{{ __('ui.name_placeholder') }}" name="informant_name"
                                autocomplete="off"/>
                            <span class="text-danger">{{ $errors->first('informant_name') }}</span>

                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.relationship_with_arrestee') }}</p>
                        </div>
                        <div class="inputValue">
                            <select
                                data-value="{{old('informant_association_with_victim')}}"
                                id="inform_association" name="informant_association_with_victim">
                                <option value="" selected disabled>{{ __('ui.relationship_placeholder') }}</option>
                                <option value="Family">Family</option>
                                <option value="Friend">Friend</option>
                                <option value="Social Media">Social Media</option>
                                <option value="Witness">Witness</option>
                            </select>

                            <span class="text-danger">{{ $errors->first('informant_association_with_victim') }}</span>

                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.informer_phone') }}</p>
                        </div>
                        <div class="inputValue">
                            <input type="number" id="age" placeholder="{{ __('ui.phone_placholder') }}"
                                   value="{{old('informant_phone')}}"
                                   name="informant_phone"/>
                            <span class="text-danger">{{ $errors->first('informant_phone') }}</span>

                        </div>
                    </div>
                </div>
                <div class="inputCheckbox">
                    <input type="checkbox" name="terms" id="terms">
                    <label for="terms">Thank you for your information. Please note that we will verify and update as
                        soon as we can.</label>
                </div>

            </div>
            <div class="submitButton">
                <button id="submit" type="submit">{{ __('ui.submit') }}</button>
            </div>
        </div>
    </form>



    <script>
        $(document).ready(function () {
            if ($("#terms").is(':checked')) $("#submit").prop("disabled", false);
            else $("#submit").prop("disabled", true);

            $('#terms').click(function () {
                if ($("#terms").is(':checked')) $("#submit").prop("disabled", false);
                else $("#submit").prop("disabled", true);
            });

        })
    </script>
    @include('web.layout.success_msg')

@endsection

@section('script')
    <script type="text/javascript" src="{{asset('web/js/form.js')}}"></script>
    <script type="text/javascript" defer>
        selectValue($('#gender'));
        selectValue($('#occupation'));
        selectValue($('#state'));
        selectValue($('#reason_of_arrest'));
        selectValue($('#inform_association'));
    </script>
@endsection



