@extends('admin.layout.master')

@section('title', ' Stats')


@section('content')

    <div class="main-container">
        <header class="header pl-2">
            <nav>
                <a href="#" class="a-clear text-dark fm-roboto fs17">Stats</a>

            </nav>
        </header>
        <div>
            <form class="position-relative w-100 h-100 bg-white p-2 mt-3">
                <div class="d-flex justify-content-between px-3 pt-2 pb-2">
                    <div>
                        <a href="{{route('stats.create')}}" class="a-clear text-white">
                            <button type="button" class="btn btn-primary py-1 px-5 rounded-0">

                                Add
                            </button>

                        </a>
                    </div>
                    <div>
                    </div>
                </div>
                <table class="table table-striped table-borderless" id="myTable">
                    <thead>
                    <tr class="thead-light">
                        <th class="table-header">
                            No.
                        </th>
                        <th class="table-header"> Total Death</th>
                        <th class="table-header">Abducted</th>
                        <th class="table-header">Date</th>
                        <th class="table-header">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr></tr>

                    @foreach($stats as $i => $stat)
                        <tr>
                            <th scope="row" class="padding-table-row">
                                <span class="text-td">
                                    {{ $stats->perPage()*($stats->currentPage()-1)+ (++$i) }}
                                </span>
                            </th>
                            <td class="padding-table-row">
                                <div class="text-td text-capitalize">
                                    {{$stat->total_death}}
                                </div>
                            </td>
                            <td class="padding-table-row">
                                <div class="text-td text-capitalize">
                                    {{$stat->abducted}}
                                </div>
                            </td>
                            <td class="padding-table-row">
                                <div class="text-td text-capitalize">
                                    {{$stat->created_at}}
                                </div>
                            </td>

                            <td class="padding-table-row w89px">
                                <button type="button" class="btn-clear " title="Edit" id="edit-button">
                                    <a class="a-clear text-dark" href="stats/{{$stat->id}}/edit">
                                        <i class="far fa-edit fw300" style="color:#673ab7;"></i>
                                    </a>
                                </button>

{{--                                <button type="button" id="delete-button" class="btn-clear" title="Delete"--}}
{{--                                        data-toggle="modal" onclick="deleteItem('stats',{{$stat->id}})" data-target="#delete">--}}
{{--                                    <i class="fal fa-times text-danger fw300"></i>--}}
{{--                                </button>--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>


            </form>
            @include('admin.layout.pagination', ['paginator' => $stats])



        </div>
        @include('admin.layout.session_message')
    </div>
    @include("admin.modal_boxes.delete")

@endsection
