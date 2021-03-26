@extends('web.layout.master')

@section('title', 'Dead Info')

@section('content')

    <form action="{{ route('store.dead') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="inputContainer">
            <div class="inputDataBox">
                <div class="mainHeader">
                    <h3>{{ __('ui.dead_person_info') }}</h3>
                </div>
                <div class="leftInfo">
                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.deceased_name') }}</p>
                        </div>
                        <div class="inputValue">
                            <input type="text" placeholder="{{ __('ui.name_placeholder') }}" name="name"
                                autocomplete="off" />
                            <span class="text-danger">{{ $errors->first('name') }}</span>

                        </div>
                    </div>
                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.deceased_age') }}</p>
                        </div>
                        <div class="inputValue">
                            <input type="number" id="age" name="age" min="10" max="99"
                                placeholder="{{ __('ui.age_placeholder') }}" />
                            <span class="text-danger">{{ $errors->first('age') }}</span>

                        </div>
                    </div>
                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.gender') }}</p>
                        </div>

                        <div class="inputValue">
                            <select id="gender" name="gender">
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
                            <p>{{ __('ui.state') }}</p>
                        </div>
                        <div class="inputValue">
                            <select id="state" name="state_id" title="State">
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
                            <input type="text" placeholder="{{ __('ui.arrestee_township_placeholder') }}"
                                   name="address"/>
                            <span class="text-danger">{{ $errors->first('address') }}</span>


                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.deceased_occupation') }}</p>
                        </div>
                        <div class="inputValue">
                            {{-- <select id="occupation" name="occupation">
                                <option value="" selected disabled>Choose Occupation</option>
                                <option value="Student">Student</option>
                                <option value="CDM Staff">CDM staff</option>
                                <option value="Government Official">Government official</option>
                                <option value="Political Party Member">Political party member</option>
                                <option value="Journalist">Journalist</option>
                                <option value="Civilian">Civilian</option>
                                <option value="Other">Other</option>
                            </select> --}}
                            @include('components.form.occupation_selector')
                            <span class="text-danger">{{ $errors->first('occupation') }}</span>

                        </div>
                        {{-- <div class="inputValue" style="display: none"> --}}
                        {{-- <input type="text" placeholder="please specify" name="name" /> --}}
                        {{-- </div> --}}
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.deceased_association') }}</p>
                        </div>
                        <div class="inputValue">
                            <input type="text" placeholder="{{ __('ui.association_placeholder') }}"
                                name="organization_name" />
                            <span class="text-danger">{{ $errors->first('organization_name') }}</span>

                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.death_date') }}</p>
                        </div>
                        <div class="inputValue">
                            <input type="date" id="arrested_date" name="detained_date" />
                            <span class="text-danger">{{ $errors->first('detained_date') }}</span>

                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.reason_of_death') }}</p>
                        </div>
                        <div class="inputValue">
                            <select id="township" name="reason_of_dead">
                                <option value="" selected disabled>{{ __('ui.choose_reason_of_death') }}</option>
                                <option value="Gunshot">{{ __('ui.gunshot') }}</option>
                                <option value="Beaten">{{ __('ui.beaten') }}</option>
                                <option value="Other">{{ __('ui.others') }}</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('reason_of_dead') }}</span>

                        </div>

                    </div>
                </div>

                <div class="rightInfo">
                    {{-- <div class="inputBox"> --}}
                    {{-- <div class="inputHeader"> --}}
                    {{-- <p>ဖမ်းဆီးခံရသူအား ချုပ်နှောင်ထားသည့် အကျဥ်းထောင်</p> --}}
                    {{-- <p>(မသိပါက အလွတ်ထားခဲ့ပါ)</p> --}}
                    {{-- </div> --}}
                    {{-- <div class="inputValue"> --}}
                    {{-- <input type="text" placeholder="ဥပမာ... အင်းစိန်အကျဥ်းထောင်" name="prison" autocomplete="off" /> --}}
                    {{-- <span class="text-danger">{{$errors->first('prison')}}</span> --}}

                    {{-- </div> --}}
                    {{-- </div> --}}

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.comment') }}</p>
                        </div>
                        <div class="inputValue">
                            <textarea type="text" rows="6" placeholder="{{ __('ui.deceased_comment_placeholder') }}"
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
                            <input type="text" placeholder="{{ __('ui.name_placeholder') }}" name="informant_name"
                                autocomplete="off" />
                            <span class="text-danger">{{ $errors->first('informant_name') }}</span>

                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.relationship_with_arrestee') }}</p>
                        </div>
                        <div class="inputValue">
                            <select id="township" name="informant_association_with_victim">
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
                                name="informant_phone" />
                            <span class="text-danger">{{ $errors->first('informant_phone') }}</span>

                        </div>
                    </div>
                </div>
                <div class="inputCheckbox">
                    <input type="checkbox" name="terms" id="terms">
                    <label for="terms" >Thank you for your information. Please note that we will verify and update as soon as we can.</label>
                </div>
            </div>

            <div class="submitButton">
                <button id="submit" type="submit">{{ __('ui.submit') }}</button>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function(){
            if($("#terms").is(':checked')) $("#submit").prop( "disabled", false );
            else $("#submit").prop( "disabled", true );

            $('#terms').click(function(){
                if($("#terms").is(':checked')) $("#submit").prop( "disabled", false );
                else $("#submit").prop( "disabled", true );
            });

        })
    </script>
    @include('web.layout.success_msg')





@endsection
