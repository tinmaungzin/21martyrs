@extends('layout.web.master')

@section('title', 'Detained Info')

@section('content')

    <form action="{{route('store.detained')}}" method="post">
        @csrf
        <div class="inputContainer">
        <div class="inputDataBox">
            <div class="mainHeader">
                <h3>ဖမ်းဆီးခံရသူ၏ အချက်အလက်များကို ဖြည့်သွင်းရန်</h3>
            </div>
            <div class="leftInfo">
                <div class="inputBox">
                    <div class="inputHeader">
                        <p>ဖမ်းဆီးခံရသူ၏ အမည်</p>
                    </div>
                    <div class="inputValue">
                        <input type="text" placeholder="ဥပမာ... မောင်မောင်" name="name" autocomplete="off" />
                        <span class="text-danger">{{$errors->first('name')}}</span>

                    </div>
                </div>
                <div class="inputBox">
                    <div class="inputHeader">
                        <p>ဖမ်းဆီးခံရသူ၏ အသက်</p>
                    </div>
                    <div class="inputValue">
                        <input type="number" id="age" name="age" min="10" max="99" placeholder="ဥပမာ... 21" />
                        <span class="text-danger">{{$errors->first('age')}}</span>

                    </div>
                </div>
                <div class="inputBox">
                    <div class="inputHeader">
                        <p>ဖမ်းဆီးခံရသူ၏ လိင်</p>
                    </div>

                    <div class="inputValue">
                        <select id="gender" name="gender">
                            <option value="" selected disabled>Choose Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Others</option>
                        </select>
                        <span class="text-danger">{{$errors->first('gender')}}</span>


                    </div>
                </div>

                <div class="inputBox">
                    <div class="inputHeader">
                        <p>ဖမ်းဆီးခံရသူနေထိုင်ရာ ပြည်နယ်/တိုင်းဒေသကြီး</p>
                    </div>
                    <div class="inputValue">
                        <select id="state" name="state_id" title="State">
                            <option value="" disabled selected>Choose State</option>
                            @foreach($states as $state)
                            <option value="{{$state->id}}">{{$state->name}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{$errors->first('state_id')}}</span>

                    </div>
                </div>

                <div class="inputBox">
                    <div class="inputHeader">
                        <p>ဖမ်းဆီးခံရသူနေထိုင်ရာ မြို့</p>
                    </div>
                    <div class="inputValue">
                        <select id="city" name="city_id">
                            <option value="" selected disabled>Choose City</option>
                        </select>
                        <span class="text-danger">{{$errors->first('city_id')}}</span>

                    </div>
                </div>

                <div class="inputBox">
                    <div class="inputHeader">
                        <p>ဖမ်းဆီးခံရသူ၏ အလုပ်အကိုင်</p>
                    </div>
                    <div class="inputValue">
                        <select id="occupation" name="occupation">
                            <option value="" selected disabled>Choose Occupation</option>
                            <option value="Student">Student</option>
                            <option value="CDM Staff">CDM staff</option>
                            <option value="Government Official">Government official</option>
                            <option value="Political Party Member">Political party member</option>
                            <option value="Journalist">Journalist</option>
                            <option value="Civilian">Civilian</option>
                            <option value="Other">Other</option>
                        </select>
                        <span class="text-danger">{{$errors->first('occupation')}}</span>

                    </div>
{{--                    <div class="inputValue" style="display: none">--}}
{{--                        <input type="text" placeholder="please specify" name="name" />--}}
{{--                    </div>--}}
                </div>

                <div class="inputBox">
                    <div class="inputHeader">
                        <p>ဖမ်းဆီးခံရသူ၏ အဖွဲ့အစည်း</p>
                    </div>
                    <div class="inputValue">
                        <input
                            type="text"
                            placeholder="တက္ကသိုလ်/အဖွဲ့အစည်း/ရုံး အမည်"
                            name="organization_name"
                        />
                        <span class="text-danger">{{$errors->first('organization_name')}}</span>

                    </div>
                </div>

                <div class="inputBox">
                    <div class="inputHeader">
                        <p>ဖမ်းဆီးခံရသည့် နေ့ရက်</p>
                    </div>
                    <div class="inputValue">
                        <input type="date" id="arrested_date" name="detained_date" />
                        <span class="text-danger">{{$errors->first('detained_date')}}</span>

                    </div>
                </div>

                <div class="inputBox">
                    <div class="inputHeader">
                        <p>ဖမ်းဆီးခံရသည့် အကြောင်းအရင်း</p>
                    </div>
                    <div class="inputValue">
                        <select id="township" name="reason_of_arrest">
                            <option value="" selected disabled>Choose Reason Of Arrest</option>
                            <option value="Protest">Protester</option>
                            <option value="Bystand">Bystander</option>
                            <option value="Other">Others</option>
                        </select>
                        <span class="text-danger">{{$errors->first('reason_of_arrest')}}</span>

                    </div>

                </div>
            </div>

            <div class="rightInfo">
                <div class="inputBox">
                    <div class="inputHeader">
                        <p>ဖမ်းဆီးခံရသူအား ချုပ်နှောင်ထားသည့် အကျဥ်းထောင်</p>
                        <p>(မသိပါက အလွတ်ထားခဲ့ပါ)</p>
                    </div>
                    <div class="inputValue">
                        <input type="text" placeholder="ဥပမာ... အင်းစိန်အကျဥ်းထောင်" name="prison" autocomplete="off" />
                        <span class="text-danger">{{$errors->first('prison')}}</span>

                    </div>
                </div>

                <div class="inputBox">
                    <div class="inputHeader">
                        <p>မှတ်ချက်</p>
                    </div>
                    <div class="inputValue">
                        <textarea type="text" rows="6" placeholder="ပြောလိုသည်များကို ဒီနေရာမှာ ရေးခဲ့နိုင်ပါတယ်။" name="comment" autocomplete="off" ></textarea>
                        <span class="text-danger">{{$errors->first('comment')}}</span>

                    </div>
                </div>

                <div class="inputBoxImg">
                    <input type="file" id="myFile" name="photo" />
                    <span class="text-danger">{{$errors->first('photo')}}</span>

                </div>



                <h3>အချက်အလက်ဖြည့်သွင်းသူ</h3>
                <div class="inputBox">
                    <div class="inputHeader">
                        <p>အမည် (အမည်လွှဲ ဖြည့်သွင်းနိုင်သည်။)</p>
                    </div>
                    <div class="inputValue">
                        <input type="text" placeholder="ဥပမာ... အောင်အောင်" name="informant_name" autocomplete="off" />
                        <span class="text-danger">{{$errors->first('informant_name')}}</span>

                    </div>
                </div>

                <div class="inputBox">
                    <div class="inputHeader">
                        <p>ဖမ်းဆီးခံရသူနှင့် တော်စပ်ပုံ</p>
                    </div>
                    <div class="inputValue">
                        <input type="text" placeholder="ဥပမာ... သူငယ်ချင်း/ ဆွေမျိုး" name="informant_association_with_victim" autocomplete="off" />
                        <span class="text-danger">{{$errors->first('informant_association_with_victim')}}</span>

                    </div>
                </div>

                <div class="inputBox">
                    <div class="inputHeader">
                        <p>ဆက်သွယ်ရန် ဖုန်းနံပါတ်</p>
                    </div>
                    <div class="inputValue">
                        <input
                            type="number"
                            id="age"
                            placeholder="ဥပမာ... 09969786420"
                            name="informant_phone"
                        />
                        <span class="text-danger">{{$errors->first('informant_phone')}}</span>

                    </div>
                </div>
            </div>
        </div>
        <div class="submitButton">
            <button type="submit">ပေးပို့မည်</button>
        </div>
    </div>
    </form>


    <script>
        $(document).ready(function() {

            function ajaxHeaders()
            {
                return $.ajaxSetup({
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    }
                });
            }


            $('#state').change(function(){
                $('#city').empty();

                let data = { state_id: $('#state').val()};
                let cities;
                ajaxHeaders();

                $.post('/fetchCities', JSON.stringify(data))
                    .done(function(data)
                    {
                        if(data.success)
                        {
                            cities = data.cities;
                            cities.forEach(function(city)
                            {
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
