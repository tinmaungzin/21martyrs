@extends('admin.layout.master')

@section('title', ' Published Posts')


@section('content')

    <div class="main-container">
        <header class="header pl-2">
            <nav>
                <a href="#" class="a-clear text-dark fm-roboto fs17">Published Posts</a>

            </nav>
        </header>
        <div>
            <form class="position-relative w-100 h-100 bg-white p-2 mt-3">
                <div class="d-flex justify-content-between px-3 pt-2 pb-2">
                    <div>
                        <input type="text" name="name" placeholder="Type Name">
                        <button onclick="location = this.value;" class="btn-primary" type="submit">Search</button>
                    </div>
                    @if($query_string != [])
                        <div>
                            <p> <b> Search results for</b>  : {{$query_string['name']}}</p>
                        </div>
                    @endif

                </div>
                <table class="table table-striped table-borderless" id="myTable">
                    <thead>
                    <tr class="thead-light">
                        <th class="table-header">
                            No.
                        </th>
                        <th class="table-header"> Name</th>
                        <th class="table-header">Status</th>
                        <th class="table-header">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr></tr>

                    @foreach($posts as $i => $post)
                        <tr>
                            <th scope="row" class="padding-table-row">
                                <span class="text-td">
                                    {{ $posts->perPage()*($posts->currentPage()-1)+ (++$i) }}
                                </span>
                            </th>
                            <td class="padding-table-row">
                                <div class="text-td text-capitalize">
                                    {{$post->name}}
                                </div>
                            </td>
                            <td class="padding-table-row">
                                <div class="text-td text-capitalize">
                                    {{$post->status}}
                                </div>
                            </td>


                            <td class="padding-table-row w89px">
                                <button type="button" class="btn-clear " title="Edit" id="edit-button">
                                    <a class="a-clear text-dark" target="_blank"  href="{{route('profile',['post'=> $post->id])}}">
                                        <i class="fas fa-eye" style="color:#673ab7;"></i>
                                    </a>
                                </button>

                                <button type="button" id="delete-button" class="btn-clear" title="Delete"
                                        data-toggle="modal" onclick="deleteItem('published_posts',{{$post->id}})" data-target="#delete">
                                    <i class="fal fa-times text-danger fw300"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>


            </form>
            @include('admin.layout.pagination', ['paginator' => $posts->appends($query_string)])



        </div>
        @include('admin.layout.session_message')
    </div>
    @include("admin.modal_boxes.delete")

@endsection
