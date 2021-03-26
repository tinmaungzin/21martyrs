@extends('admin.layout.master')
@section('title', 'Feedback')
@section('content')
    <div class="main-container">
        <header class="header pl-2">
            <nav>
                <a href="#" class="a-clear text-dark fm-roboto fs17">Feedback</a>

            </nav>
        </header>
        <div>


            <form class="position-relative w-100 h-100 bg-white p-2 mt-3"
                  action="">
                <div class="row mx-0 pt-3 mb-3" style="padding-left: 15px;">
                    <span>Name</span> : <span style="padding-left: 100px;">{{$feedback->name}}</span>
                </div>
                <div class="row mx-0 pt-3 mb-3" style="padding-left: 15px;">
                    <span>Name</span> : <span style="padding-left: 100px;">{{$feedback->email}} </span>

                </div>
                <div class="row mx-0 pt-3 mb-3" style="padding-left: 15px;">
                    <span>Name</span> : <span style="padding-left: 100px;">{{$feedback->message}} </span>

                </div>

            </form>
        </div>
    </div>
@endsection
