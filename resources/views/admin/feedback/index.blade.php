@extends('admin.layout.master')

@section('title', ' Feedbacks')


@section('content')

    <div class="main-container">
        <header class="header pl-2">
            <nav>
                <a href="#" class="a-clear text-dark fm-roboto fs17">Feedbacks</a>

            </nav>
        </header>
        <div>
            <form class="position-relative w-100 h-100 bg-white p-2 mt-3">
                <div class="d-flex justify-content-between px-3 pt-2 pb-2">
{{--                    <div>--}}
{{--                        <a href="{{route('admins.create')}}" class="a-clear text-white">--}}
{{--                            <button type="button" class="btn btn-primary py-1 px-5 rounded-0">--}}

{{--                                Add--}}
{{--                            </button>--}}

{{--                        </a>--}}
{{--                    </div>--}}
                    <div>
                    </div>
                </div>
                <table class="table table-striped table-borderless" id="myTable">
                    <thead>
                    <tr class="thead-light">
                        <th class="table-header">
                            No.
                        </th>
                        <th class="table-header"> Name</th>
                        <th class="table-header">Email</th>
                        <th class="table-header">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr></tr>

                    @foreach($feedbacks as $i => $feedback)
                        <tr>
                            <th scope="row" class="padding-table-row">
                                <span class="text-td">
                                    {{ $feedbacks->perPage()*($feedbacks->currentPage()-1)+ (++$i) }}
                                </span>
                            </th>
                            <td class="padding-table-row">
                                <div class="text-td text-capitalize">
                                    {{$feedback->name}}
                                </div>
                            </td>
                            <td class="padding-table-row">
                                <div class="text-td text-capitalize">
                                    {{$feedback->email}}
                                </div>
                            </td>

                            <td class="padding-table-row w89px">
                                <button type="button" class="btn-clear " title="Show" id="edit-button">
                                    <a class="a-clear text-dark" href="{{route('feedback.show',['feedback'=> $feedback->id])}}">
                                        <i class="fas fa-eye" style="color:#673ab7;"></i>
                                    </a>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>


            </form>
            @include('admin.layout.pagination', ['paginator' => $feedbacks])



        </div>
        @include('admin.layout.session_message')
    </div>
    @include("admin.modal_boxes.delete")

@endsection
