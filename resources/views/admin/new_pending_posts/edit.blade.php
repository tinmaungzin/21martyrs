@extends('web.layout.master')

@section('title', 'Suggestion to edit Info')

@section('content')

    <form action="{{route('handle.new_pending_post',['pendingPost'=> $pendingPost->id])}}" method="post" enctype="multipart/form-data">>
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
                            <input type="text" placeholder="{{ __('ui.name_placeholder') }}" name="name" value="{{$post->name}}" autocomplete="off" />
                            <span class="text-danger">{{$errors->first('name')}}</span>

                        </div>
                    </div>
                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.deceased_age') }}</p>

                        </div>
                        <div class="inputValue">
                            <input type="number" id="age" name="age" value="{{$post->age}}" min="10" max="99" placeholder="{{ __('ui.age_placeholder') }}" />
                            <span class="text-danger">{{$errors->first('age')}}</span>

                        </div>
                    </div>
                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.gender') }}</p>

                        </div>

                        <div class="inputValue">
                            <select id="gender" name="gender">
                                <option value="" disabled>{{ __('ui.choose_gender') }}</option>
                                <option @if($post->gender == 'Male') selected @endif value="Male">{{ __('ui.male') }}</option>
                                <option @if($post->gender == 'Female') selected @endif value="Female">{{ __('ui.female') }}</option>
                                <option @if($post->gender == 'Other') selected @endif value="Other">{{ __('ui.other') }}</option>
                            </select>
                            <span class="text-danger">{{$errors->first('gender')}}</span>


                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.state') }}</p>

                        </div>
                        <div class="inputValue">
                            <select id="state" name="state_id" title="State">
                                <option value="" disabled selected>{{ __('ui.choose_state') }}</option>
                                @foreach($states as $state)
                                    <option @if($post->state_id == $state->id) selected @endif value="{{$state->id}}">{{$state->name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{$errors->first('state_id')}}</span>

                        </div>
                    </div>


                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.arrestee_township') }}</p>
                        </div>
                        <div class="inputValue">
                            <input type="text" value="{{$post->address}}" placeholder="{{ __('ui.arrestee_township_placeholder') }}"
                                   name="address"/>
                            <span class="text-danger">{{ $errors->first('address') }}</span>

                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.deceased_occupation') }}</p>

                        </div>
                        <div class="inputValue">
                            <select id="occupation" name="occupation">
                                <option value="" selected disabled>{{ __('ui.choose_occupation') }}</option>

                                <option @if($post->occupation == 'Student') selected @endif value="Student">{{ __('ui.student') }}</option>
                                <option @if($post->occupation == 'CDM Staff') selected @endif value="CDM Staff">{{ __('ui.cdm_staff') }}</option>
                                <option @if($post->occupation == 'Government Official') selected @endif value="Government Official">{{ __('ui.government_offical') }}</option>
                                <option @if($post->occupation == 'Political Party Member') selected @endif value="Political Party Member">{{ __('ui.political_party_member') }}</option>
                                <option @if($post->occupation == 'Journalist') selected @endif value="Journalist">{{ __('ui.journalist') }}</option>
                                <option @if($post->occupation == 'Civilian') selected @endif value="Civilian">{{ __('ui.civilian') }}</option>
                                <option @if($post->occupation == 'Other') selected @endif value="Other">{{ __('ui.other') }}</option>
                            </select>
                            <span class="text-danger">{{$errors->first('occupation')}}</span>

                        </div>
                        {{--                    <div class="inputValue" style="display: none">--}}
                        {{--                        <input type="text" placeholder="please specify" name="name" />--}}
                        {{--                    </div>--}}
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.deceased_association') }}</p>

                        </div>
                        <div class="inputValue">
                            <input
                                type="text"
                                placeholder="{{ __('ui.association_placeholder') }}"
                                name="organization_name"
                                value="{{$post->organization_name}}"
                            />
                            <span class="text-danger">{{$errors->first('organization_name')}}</span>

                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.death_date') }}</p>

                        </div>
                        <div class="inputValue">
                            <input type="date" id="arrested_date" value="{{$post->detained_date}}" name="detained_date" />
                            <span class="text-danger">{{$errors->first('detained_date')}}</span>

                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.reason_of_death') }}</p>

                        </div>
                        <div class="inputValue">
                            <select id="township" name="reason_of_dead">
                                <option value="" disabled>{{ __('ui.choose_reason_of_death') }}</option>
                                <option @if($post->reason_of_dead == 'Gunshot') selected @endif  value="Gunshot">{{ __('ui.gunshot') }}</option>
                                <option @if($post->reason_of_dead == 'Beaten') selected @endif value="Beaten">{{ __('ui.beaten') }}</option>
                                <option @if($post->reason_of_dead == 'Other') selected @endif value="Other">{{ __('ui.others') }}</option>
                            </select>
                            <span class="text-danger">{{$errors->first('reason_of_dead')}}</span>

                        </div>

                    </div>
                </div>

                <div class="rightInfo">
                    {{--                <div class="inputBox">--}}
                    {{--                    <div class="inputHeader">--}}
                    {{--                        <p>ဖမ်းဆီးခံရသူအား ချုပ်နှောင်ထားသည့် အကျဥ်းထောင်</p>--}}
                    {{--                        <p>(မသိပါက အလွတ်ထားခဲ့ပါ)</p>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="inputValue">--}}
                    {{--                        <input type="text" value="{{$post->prison}}" placeholder="ဥပမာ... အင်းစိန်အကျဥ်းထောင်" name="prison" autocomplete="off" />--}}
                    {{--                        <span class="text-danger">{{$errors->first('prison')}}</span>--}}

                    {{--                    </div>--}}
                    {{--                </div>--}}

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.comment') }}</p>

                        </div>
                        <div class="inputValue">
                            <textarea type="text" rows="6" placeholder="ပ{{ __('ui.deceased_comment_placeholder') }}" name="comment" autocomplete="off" >{{$post->comment}}</textarea>
                            <span class="text-danger">{{$errors->first('comment')}}</span>

                        </div>
                    </div>

                    <div class="inputBoxImg">
                        <input type="file" id="myFile" name="photo" />
                        <span class="text-danger">{{$errors->first('photo')}}</span>

                    </div>



                    <h3>{{ __('ui.informer_info') }}</h3>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.informer_name') }}</p>
                        </div>
                        <div class="inputValue">
                            <input type="text" placeholder="{{ __('ui.name_placeholder') }}" name="informant_name" autocomplete="off" />
                            <span class="text-danger">{{$errors->first('informant_name')}}</span>

                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.relationship_with_deceased') }}</p>
                        </div>
                        <div class="inputValue">
                            <input type="text" placeholder="{{ __('ui.relationship_placeholder') }}" name="informant_association_with_victim" autocomplete="off" />
                            <span class="text-danger">{{$errors->first('informant_association_with_victim')}}</span>

                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="inputHeader">
                            <p>{{ __('ui.informer_phone') }}</p>

                        </div>
                        <div class="inputValue">
                            <input
                                type="number"
                                id="age"
                                placeholder="{{ __('ui.phone_placholder') }}"
                                name="informant_phone"
                            />
                            <span class="text-danger">{{$errors->first('informant_phone')}}</span>

                        </div>
                    </div>
                </div>
            </div>
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
    </form>



@endsection
