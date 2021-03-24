@extends('web.layout.master')

@section('title', 'Confirm Pending Post')

@section('content')


    <div>
        <div class="confirmBox">
            <div class="arresteeConfirmInfo">
                <h3>Arrestee's Info</h3>
                <div class="leftConfirmInfo">
                    <div class="confirmHeaders">
                        <span>Name</span>
                    </div>
                    <div class="confirmValues">
                        <span>:</span>
                        <span>{{$pendingPost->name}}</span>
                    </div>
                </div>
                <div class="leftConfirmInfo">
                    <div class="confirmHeaders">
                        <span>Age</span>
                    </div>
                    <div class="confirmValues">
                        <span>:</span>
                        <span>{{$pendingPost->age}}</span>
                    </div>
                </div>
                <div class="leftConfirmInfo">
                    <div class="confirmHeaders">
                        <span>Gender</span>
                    </div>
                    <div class="confirmValues">
                        <span>:</span>
                        <span>{{$pendingPost->gender}}</span>
                    </div>
                </div>
                <div class="leftConfirmInfo">
                    <div class="confirmHeaders">
                        <span> Date</span>
                    </div>
                    <div class="confirmValues">
                        <span>:</span>
                        <span>{{$pendingPost->detained_date}}</span>
                    </div>
                </div>
                <div class="leftConfirmInfo">
                    <div class="confirmHeaders">
                        <span>Occupation</span>
                    </div>
                    <div class="confirmValues">
                        <span>:</span>
                        <span>{{$pendingPost->occupation}}</span>
                    </div>
                </div>
                <div class="leftConfirmInfo">
                    <div class="confirmHeaders">
                        <span>Organization</span>
                    </div>
                    <div class="confirmValues">
                        <span>:</span>
                        <span>{{$pendingPost->organization_name}}</span>
                    </div>
                </div>
                @if($pendingPost->status == 'detained')
                <div class="leftConfirmInfo">
                    <div class="confirmHeaders">
                        <span>Reason of being arrested</span>
                    </div>
                    <div class="confirmValues">
                        <span>:</span>
                        <span>{{$pendingPost->reason_of_arrest}}</span>
                    </div>
                </div>
                @endif
                @if($pendingPost->status == 'dead')
                    <div class="leftConfirmInfo">
                        <div class="confirmHeaders">
                            <span>Reason of being dead</span>
                        </div>
                        <div class="confirmValues">
                            <span>:</span>
                            <span>{{$pendingPost->reason_of_dead}}</span>
                        </div>
                    </div>
                @endif

                @if(isset($pendingPost->prison))
                <div class="leftConfirmInfo">
                    <div class="confirmHeaders">
                        <span>Prison</span>
                    </div>
                    <div class="confirmValues">
                        <span>:</span>
                        <span>{{$pendingPost->prison}}</span>
                    </div>
                </div>
                @endif
                <div class="leftConfirmInfo">
                    <div class="confirmHeaders">
                        <span>Status</span>
                    </div>
                    <div class="confirmValues">
                        <span>:</span>
                        <span>{{$pendingPost->status}}</span>
                    </div>
                </div>
                <div class="leftConfirmInfo">
                    <div class="confirmHeaders">
                        <span>Photo</span>
                    </div>
                    <div class="confirmValues">
                        <img
                            src="{{$pendingPost->profile_url}}"
                            alt="{{$pendingPost->name}}"
                        />
                    </div>
                </div>
                <div class="leftConfirmInfo">
                    <div class="confirmHeaders">
                        <span>Comment</span>
                    </div>
                    <div class="confirmValues">
                        <span>:</span>
                        <span>{{$pendingPost->comment}}</span>
                    </div>
                </div>
            </div>

            <div class="InformerConfirmInfo">
                <h3>Informer's Info</h3>
                <div class="rightConfirmInfo">
                    <div class="confirmHeaders">
                        <span>Name</span>
                    </div>
                    <div class="confirmValues">
                        <span>:</span>
                        <span>{{$pendingPost->informant_name}}</span>
                    </div>
                </div>
                <div class="rightConfirmInfo">
                    <div class="confirmHeaders">
                        <span>Relationship with arrestee</span>
                    </div>
                    <div class="confirmValues">
                        <span>:</span>
                        <span>{{$pendingPost->informant_association_with_victim}}</span>
                    </div>
                </div>
                <div class="rightConfirmInfo">
                    <div class="confirmHeaders">
                        <span>Informer's contact no</span>
                    </div>
                    <div class="confirmValues">
                        <span>:</span>
                        <span>{{$pendingPost->informant_phone}}</span>
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
    </div>

@endsection
