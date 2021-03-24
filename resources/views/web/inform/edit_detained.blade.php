@extends('web.layout.master')

@section('title', 'Suggestion to edit Info')

@section('content')

    <form action="{{route('store.edit.detained',['post' => $post->id])}}" method="post" enctype="multipart/form-data">>
        @csrf
        <div class="inputContainer">
        <div class="inputDataBox">
            <div class="mainHeader">
                <h3>ဖမ်းဆီးခံရသူ၏ အချက်အလက်များကို ပြင်ဆင်ရန် အကြံပြုလွှာ</h3>
            </div>
            <div class="leftInfo">
                <div class="inputBox">
                    <div class="inputHeader">
                        <p>ဖမ်းဆီးခံရသူ၏ အမည်</p>
                    </div>
                    <div class="inputValue">
                        <input type="text" placeholder="ဥပမာ... မောင်မောင်" name="name" value="{{$post->name}}" autocomplete="off" />
                        <span class="text-danger">{{$errors->first('name')}}</span>

                    </div>
                </div>
                <div class="inputBox">
                    <div class="inputHeader">
                        <p>ဖမ်းဆီးခံရသူ၏ အသက်</p>
                    </div>
                    <div class="inputValue">
                        <input type="number" id="age" name="age" value="{{$post->age}}" min="10" max="99" placeholder="ဥပမာ... 21" />
                        <span class="text-danger">{{$errors->first('age')}}</span>

                    </div>
                </div>
                <div class="inputBox">
                    <div class="inputHeader">
                        <p>ဖမ်းဆီးခံရသူ၏ လိင်</p>
                    </div>

                    <div class="inputValue">
                        <select id="gender" name="gender">
                            <option value="" disabled>Choose Gender</option>
                            <option @if($post->gender == 'Male') selected @endif value="Male">Male</option>
                            <option @if($post->gender == 'Female') selected @endif value="Female">Female</option>
                            <option @if($post->gender == 'Other') selected @endif value="Other">Other</option>
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
                            <option @if($post->state_id == $state->id) selected @endif value="{{$state->id}}">{{$state->name}}</option>
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
                            <option value="" disabled>Choose Occupation</option>
                            <option @if($post->occupation == 'Student') selected @endif value="Student">Student</option>
                            <option @if($post->occupation == 'CDM Staff') selected @endif value="CDM Staff">CDM staff</option>
                            <option @if($post->occupation == 'Government Official') selected @endif value="Government Official">Government official</option>
                            <option @if($post->occupation == 'Political Party Member') selected @endif value="Political Party Member">Political party member</option>
                            <option @if($post->occupation == 'Journalist') selected @endif value="Journalist">Journalist</option>
                            <option @if($post->occupation == 'Civilian') selected @endif value="Civilian">Civilian</option>
                            <option @if($post->occupation == 'Other') selected @endif value="Other">Other</option>
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
                            value="{{$post->organization_name}}"
                        />
                        <span class="text-danger">{{$errors->first('organization_name')}}</span>

                    </div>
                </div>

                <div class="inputBox">
                    <div class="inputHeader">
                        <p>ဖမ်းဆီးခံရသည့် နေ့ရက်</p>
                    </div>
                    <div class="inputValue">
                        <input type="date" id="arrested_date" value="{{$post->detained_date}}" name="detained_date" />
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
                            <option @if($post->reason_of_arrest == 'Protest') selected @endif  value="Protest">Protester</option>
                            <option @if($post->reason_of_arrest == 'Bystand') selected @endif value="Bystand">Bystander</option>
                            <option @if($post->reason_of_arrest == 'Other') selected @endif value="Other">Others</option>
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
                        <input type="text" value="{{$post->prison}}" placeholder="ဥပမာ... အင်းစိန်အကျဥ်းထောင်" name="prison" autocomplete="off" />
                        <span class="text-danger">{{$errors->first('prison')}}</span>

                    </div>
                </div>

                <div class="inputBox">
                    <div class="inputHeader">
                        <p>မှတ်ချက်</p>
                    </div>
                    <div class="inputValue">
                        <textarea type="text" rows="6" placeholder="ပြောလိုသည်များကို ဒီနေရာမှာ ရေးခဲ့နိုင်ပါတယ်။" name="comment" autocomplete="off" >{{$post->comment}}</textarea>
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
        function ajaxHeaders()
        {
            return $.ajaxSetup({
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
        }

        function fetchCities()
        {
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
        }


        function fetchCitiesOnLoad()
        {
            let selected_city_id = '<?php echo $post->city_id ;?>';

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
                            if(city.id == selected_city_id)
                            {
                                $('#city').append(`
                                        <option selected value="${ city.id }">${city.name}</option>
                                `)
                            }
                            else
                            {
                                $('#city').append(`
                                        <option value="${ city.id }">${city.name}</option>
                                `)
                            }

                        });
                    }
                });
        }
        $(document).ready(function() {



            fetchCitiesOnLoad();


            $('#state').change(function(){
                fetchCities();
            });

        });
    </script>

@endsection
