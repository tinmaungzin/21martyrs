@extends('layout.web.master')

@section('title', 'Detained Info')

@section('content')

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
                        <input type="text" placeholder="{{ __('ui.name_placeholder') }}" name="name" autofocus />
                    </div>
                </div>
                <div class="inputBox">
                    <div class="inputHeader">
                        <p>{{ __('ui.age') }}</p>
                    </div>
                    <div class="inputValue">
                        <input type="number" id="age" name="age" min="1" max="99" />
                    </div>
                </div>
                <div class="inputBox">
                    <div class="inputHeader">
                        <p>{{ __('ui.gender') }}</p>
                    </div>
                    <div class="inputValue">
                        <select id="gender" name="gender">
                            <option value="male">{{ __('ui.male') }}</option>
                            <option value="female">{{ __('ui.female') }}</option>
                        </select>
                    </div>
                </div>

                <div class="inputBox">
                    <div class="inputHeader">
                        <p>Region</p>
                    </div>
                    <div class="inputValue">
                        <select id="township" name="township">
                            <option value="ygn">Yangon</option>
                            <option value="mdy">Mandalay</option>
                            <option value="sgg">Sagaing</option>
                            <option value="mgy">Magway</option>
                            <option value="bgo">Bago</option>
                            <option value="tnt">Tanintharyi</option>
                            <option value="ayw">Ayeyarwady</option>
                            <option value="kac">Kachin</option>
                            <option value="kay">Kayah</option>
                            <option value="kia">Kayin</option>
                            <option value="chn">Chin</option>
                            <option value="mon">Mon</option>
                            <option value="rki">Rakhine</option>
                            <option value="shn">Shan</option>
                        </select>
                    </div>
                </div>

                <div class="inputBox">
                    <div class="inputHeader">
                        <p>Township</p>
                    </div>
                    <div class="inputValue">
                        <select id="township" name="township">
                            <option value="ygn">Sanchaung</option>
                            <option value="mdy">Kyinyintine</option>
                            <option value="mdy">Kamanyut</option>
                        </select>
                    </div>
                </div>

                <div class="inputBox">
                    <div class="inputHeader">
                        <p>Occupation</p>
                    </div>
                    <div class="inputValue">
                        <select id="occupation" name="occupation">
                            <option value="stu">Student</option>
                            <option value="cdm">CDM staff</option>
                            <option value="gov">Govement official</option>
                            <option value="ppm">Political party member</option>
                            <option value="jnl">Journalist</option>
                            <option value="civ">Civilian</option>
                            <option value="oth">Other</option>
                        </select>
                    </div>
                    <div class="inputValue" style="display: none">
                        <input type="text" placeholder="please specify" name="name" />
                    </div>
                </div>

                <div class="inputBox">
                    <div class="inputHeader">
                        <p>{{ __('ui.association') }}</p>
                    </div>
                    <div class="inputValue">
                        <input type="text" placeholder="University/Organization/Department .etc" name="association" />
                    </div>
                </div>

                <div class="inputBox">
                    <div class="inputHeader">
                        <p>{{ __('ui.arrested_date') }}</p>
                    </div>
                    <div class="inputValue">
                        <input type="date" id="arrested_date" name="arrested_date" />
                    </div>
                </div>

                <div class="inputBox">
                    <div class="inputHeader">
                        <p>{{ __('ui.arrested_reason') }}</p>
                    </div>
                    <div class="inputValue">
                        <select id="township" name="township">
                            <option value="protesting">{{ __('ui.protestor') }}</option>
                            <option value="political">{{ __('ui.bystander') }}</option>
                            <option value="noreason">{{ __('ui.others') }}</option>
                        </select>
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
                        <input type="text" placeholder="{{ __('ui.prison_placeholder') }}" name="name" />
                    </div>
                </div>

                <div class="inputBox">
                    <div class="inputHeader">
                        <p>{{ __('ui.arrestee_pic') }}</p>
                    </div>
                </div>
                <div class="inputBoxImg">

                    <input type="file" id="myFile" name="filename" />
                </div>

                <h3>{{ __('ui.informer_info') }}</h3>
                <div class="inputBox">
                    <div class="inputHeader">
                        <p>{{ __('ui.name') }}</p>
                    </div>
                    <div class="inputValue">
                        <input type="text" placeholder="{{ __('ui.name_placeholder') }}" name="name" />
                    </div>
                </div>

                <div class="inputBox">
                    <div class="inputHeader">
                        <p>{{ __('ui.relationship_with_arrestee') }}</p>
                    </div>
                    <div class="inputValue">
                        <input type="text" placeholder="{{ __('ui.relationship_placeholder') }}" name="name" />
                    </div>
                </div>

                <div class="inputBox">
                    <div class="inputHeader">
                        <p>{{ __('ui.informer_phone') }}</p>
                    </div>
                    <div class="inputValue">
                        <input type="number" id="age" placeholder="09xxxxxxxxx" name="age" />
                    </div>
                </div>
            </div>
        </div>
        <div class="submitButton">
            <button type="submit">{{ __('ui.submit') }}</button>
        </div>
    </div>

@endsection
