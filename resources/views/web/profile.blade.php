@extends('web.layout.master')

@section('title', 'Profile')

@section('content')


    <div class="profileBody">
        <div class="container">
            <div class="row">
                <div class="TopSection">
                    <div class="profilePicture">
                        <img
                            {{-- src="{{Str::of($post->profile_url)->isEmpty() ? asset('web/img/default-profile.jpg'): $post->profile_url}}" --}}
                            src="{{asset('web/img/default-profile.jpg')}}"
                            alt="{{$post->name}}"
                        />
                    </div>
                    <div class="profileInfo">
                        <h3>{{$post->name}}</h3>
                        <span>{{App\Utility\StringUtility::isEmpty($post->age) ? __('home.unknown'): "{$post->age} years old"}} , {{$post->gender}}</span>
                        <div class="profileStatus">
                            <h4>Status</h4>
                            <p>{{$post->status}}</p>
                        </div>
                        <div class="StatusButton">
                            <button type="button"  onclick="popup();return false;"">
                                Change Status
                              </button>
                        </div>
                    </div>
                                          
                </div>
            </div>
           
            <hr>
            <div class="row">
                <div class="bottomWarp">
                    <div class="bottomSection">
                        @if($post->status == 'Detained')
                            <h3>{{__('forms.detained_header')}}</h3>
                        @endif
                        @if($post->status == 'Dead')
                            <h3>{{__('forms.dead_header')}}</h3>
                        @endif
                        @if($post->status == 'Missing')
                            <h3>{{__('forms.missing_header')}}</h3>
                        @endif
                        @if($post->status == 'Released')
                            <h3>{{__('forms.released_header')}}</h3>
                        @endif

                        <div class="profileDetail">
                            <p class="DetailText">{{__('forms.state_label')}}:</p>
                            <p>{{is_null($post->state) ? __('home.unknown'):$post->state->name}}</p>
                        </div>
                        <div class="profileDetail">
                            <p class="DetailText">{{__('forms.address_label')}}:</p>
                            <p>
                                {{ViewUtility::displayNullableText($post->address)}}</p>
                        </div>
                        <div class="profileDetail">
                            <p class="DetailText">{{__('forms.occupation_label')}}:</p>
                            <p>{{ViewUtility::displayNullableText($post->occupation)}}</p>
                        </div>
                        <div class="profileDetail">
                            <p class="DetailText">{{__('forms.association')}}:</p>
                            <p>{{ViewUtility::displayNullableText($post->organization_name)}}</p>
                        </div>

                        <div class="profileDetail">
                            @if($post->status == 'Detained')
                                <p class="DetailText">{{__('forms.detained_date')}}:</p>
                            @endif
                            @if($post->status == 'Dead')
                                <p class="DetailText">{{__('forms.death_date')}}:</p>
                            @endif
                            @if($post->status == 'Missing')
                                <p class="DetailText">{{__('forms.missed_date')}}:</p>
                            @endif
                            @if($post->status == 'Released')
                                <p class="DetailText">{{__('forms.released')}}:</p>
                            @endif

                            @if(!($post->status == 'Released'))
                                    <p>{{is_null($post->detained_date)? __('home.unknown'): ViewUtility::displayDate($post->detained_date)
                            }}</p>
                            @endif
                            @if($post->status == 'Released')
                                    <p>{{is_null($post->released_date)? __('home.unknown'): ViewUtility::displayDate($post->released_date)
                            }}</p>
                            @endif

                        </div>
                        @if($post->status == 'Detained')
                            <div class="profileDetail">
                                <p class="DetailText">{{__('forms.detained_reason_label')}}
                                    :</p>
                                <p>{{$post->reason_of_arrest}}</p>
                            </div>
                        @endif
                        @if($post->status == 'Dead')
                            <div class="profileDetail">
                                <p class="DetailText">{{__('forms.dead_reason_label')}}:</p>
                                <p>{{$post->reason_of_dead}}</p>
                            </div>
                        @endif

                        @if(isset($post->prison))
                            <div class="profileDetail">
                                <p class="DetailText">{{__('forms.prison')}}</p>
                                <p>{{ViewUtility::displayNullableText($post->prison)}}</p>
                            </div>
                        @endif
{{--                        @if(isset($post->released_date))--}}
{{--                            <div class="profileDetail">--}}
{{--                                <p class="DetailText">{{__('forms.released_date_label')}}</p>--}}
{{--                                <p>{{ViewUtility::displayDate($post->released_date)}}</p>--}}
{{--                            </div>--}}
{{--                        @endif--}}
                        @if(isset($post->comment))
                            <div class="profileDetail">
                                <p class="DetailText">{{__('forms.comment_label')}}:</p>
                                <p>{{$post->comment}}</p>
                            </div>
                        @endif
                        <div class="editButton">
                            @if($post->status == 'Detained')
                                <a href="{{route('form.edit.detained',['post'=> $post->id])}}">
                                    <button>{{__('forms.suggest_edit')}}
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </a>
                            @endif
                            @if($post->status == 'Dead')
                                <a href="{{route('form.edit.dead',['post'=> $post->id])}}">
                                    <button>{{__('forms.suggest_edit')}}
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </a>
                            @endif
                            @if($post->status == 'Missing')
                                <a href="{{route('form.edit.missing',['post'=> $post->id])}}">
                                    <button>{{__('forms.suggest_edit')}}
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </a>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>


    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLongTitle">Modal title</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="Status">Status</label>
                      <select class="form-control id ="Status">
                        <option>Default select</option>
                        <option>Dead</option>
                        <option>Detained</option>
                        <option>Dead</option>


                      </select>
                                      
                    </div>

                    <div class="form-group">
                        <label for="arrested_date">Date</label>
                        <input type="date" id="arrested_date"  class="form-control" name="detained_date"/>
                                        
                      </div>
                   
                  </form>
                           
                </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="ChangeButton">Save changes</button>
            </div>
          </div>
        </div>
      </div>

    <script>
        function popup() {
  $('[id*="exampleModalCenter"]').modal('show');
}
    </script>

    @include('web.layout.success_msg')
    @include("web.layout.change_status")



@endsection
