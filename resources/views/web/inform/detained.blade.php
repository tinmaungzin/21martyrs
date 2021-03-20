@extends('web.layout.master')

@section('title', 'Detained Info')

@section('content')

    <form action="{{ route('store.detained') }}" method="post" enctype="multipart/form-data">>
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
                            <input type="text" placeholder="{{ __('ui.name_placeholder') }}" name="name"
                                autocomplete="off" />
                            <br />
                            <span class="text-danger">{{ $errors->first('name') }}</span>

                        </div>
                    </div>
                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.age') }}</p>
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
                                <option value="male">{{ __('ui.male') }}</option>
                                <option value="female">{{ __('ui.female') }}</option>
                                <option value="Other">Other</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('gender') }}</span>


                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.arresstee_state') }}</p>
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
                            <p>{{ __('ui.arrestee_city') }}</p>
                        </div>
                        <div class="inputValue">
                            <select id="city" name="city_id">
                                <option value="" selected disabled>{{ __('ui.choose_city') }}</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('city_id') }}</span>

                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>
                                {{ __('ui.arrestee_occupation') }}
                            </p>
                            {{-- <p>ဖမ်းဆီးခံရသူ၏ အလုပ်အကိုင်</p> --}}
                        </div>
                        <div class="inputValue">
                            <select id="occupation" name="occupation">
                                <option value="" selected disabled>{{ __('ui.choose_occupation') }}</option>
                                <option value="Student">{{ __('ui.student') }}</option>
                                <option value="CDM Staff">{{ __('ui.cdm_staff') }}</option>
                                <option value="Government Official">{{ __('ui.government_offical') }}</option>
                                <option value="Political Party Member">{{ __('ui.political_party_member') }}</option>
                                <option value="Journalist">{{ __('ui.journalist') }}</option>
                                <option value="Civilian">{{ __('ui.civilian') }}</option>
                                <option value="Other">{{ __('ui.other') }}</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('occupation') }}</span>

                        </div>
                        {{-- <div class="inputValue" style="display: none"> --}}
                        {{-- <input type="text" placeholder="please specify" name="name" /> --}}
                        {{-- </div> --}}
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.association') }}</p>
                        </div>
                        <div class="inputValue">
                            <input type="text" placeholder="{{ __('ui.arresstee_assoication_placholder') }}"
                                name="organization_name" />
                            <span class="text-danger">{{ $errors->first('organization_name') }}</span>

                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.arrested_date') }}</p>
                        </div>
                        <div class="inputValue">
                            <input type="date" id="arrested_date" name="detained_date" />
                            <span class="text-danger">{{ $errors->first('detained_date') }}</span>

                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.arrested_reason') }}</p>
                        </div>
                        <div class="inputValue">
                            <select id="township" name="reason_of_arrest">
                                <option value="" selected disabled>{{ __('ui.choose_reason_of_arrest') }}</option>
                                <option value="protesting">{{ __('ui.protestor') }}</option>
                                <option value="political">{{ __('ui.bystander') }}</option>
                                <option value="noreason">{{ __('ui.others') }}</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('reason_of_arrest') }}</span>

                        </div>
                        <div class="inputValue" style="display: none">
                            <input type="text" placeholder="{{ __('ui.please_specify') }}" name="name" />
                        </div>
                    </div>
                </div>

                <div class="rightInfo">
                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.prison') }}</p>
                        </div>
                        <div class="inputValue">
                            <input type="text" placeholder="{{ __('ui.prison_placeholder') }}" name="prison"
                                autocomplete="off" />
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
                        <input type="file" id="myFile" name="photo" />
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
                            <input type="text" placeholder="{{ __('ui.relationship_placeholder') }}"
                                name="informant_association_with_victim" autocomplete="off" />
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
            </div>
            <div class="submitButton">
                <button type="submit">{{ __('ui.submit') }}</button>
            </div>
        </div>
    </form>


    <script>
        $(document).ready(function() {

            function ajaxHeaders() {
                return $.ajaxSetup({
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    }
                });
            }


            $('#state').change(function() {
                $('#city').empty();

                let data = {
                    state_id: $('#state').val()
                };
                let cities;
                ajaxHeaders();

                $.post('/fetchCities', JSON.stringify(data))
                    .done(function(data) {
                        if (data.success) {
                            cities = data.cities;
                            cities.forEach(function(city) {
                                $('#city').append(`
                                                                    <option value="${ city.id }">${city.name}</option>
                                                            `)
                            });
                        }
                    });
            });

        });

    </script>

@endsection
