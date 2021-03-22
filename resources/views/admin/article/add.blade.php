@extends('admin.layout.master')

@section('title', ' Add Articles')

@section('style')
    <link rel="stylesheet" href="{{asset('css/katex.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/monokai-sublime.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/quill.snow.css')}}"/>
@endsection
{{--@section('style')--}}
{{--    <link rel="stylesheet" href="">--}}
{{--    @endsection--}}

@section('content')
    <div class="main-container">
        <header class="header pl-2">
            <nav>
                <a href="#" class="a-clear text-dark fm-roboto fs17">Add New Article</a>

            </nav>
        </header>
        <div>

            <form id="article_form" class="position-relative w-100 h-100 bg-white p-2 mt-3" method="post" action="{{route('articles.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row mx-0 pt-3 mb-3" style="padding-left: 15px;">
                    <div class="col-7">
                        <label for="" class="label-form mb-3" style="font-size: 17px!important;">Title</label>
                        <input type="text" class="input-form" style="border-radius: 6px;" name="title" value="{{old('title')}}"
                               placeholder="Title">
                        <span class="text-danger">{{$errors->first('title')}}</span>
                    </div>
                </div>

                <div class="row mx-0 pt-3 mb-3" style="padding-left: 15px;">
                    <div class="col-7">
                        <label for="" class="label-form mb-3" style="font-size: 17px!important;">Introduction</label>
                        <input type="text" class="input-form" style="border-radius: 6px;" name="intro" value="{{old('intro')}}"
                               placeholder="Introduction">
                        <span class="text-danger">{{$errors->first('intro')}}</span>
                    </div>
                </div>
                <div class="row mx-0 pt-3 mb-3" style="padding-left: 15px;">
                    <div class="col-7">
                        <label for="" class="label-form mb-3" style="font-size: 17px!important;">Feature Photo</label>
                        <input type="file" class="input-form" style="border-radius: 6px;" name="photo"
                               placeholder="Image">
                        <span class="text-danger">{{$errors->first('photo')}}</span>
                    </div>
                </div>

                <div class="row mx-0 pt-3 mb-3" style="padding-left: 15px;">
                    <div class="col-7">
                        <label for="" class="label-form mb-3" style="font-size: 17px!important;">Author Name</label>
                        <input type="text" class="input-form" style="border-radius: 6px;" name="author_name" value="{{old('author_name')}}"
                               placeholder="Author Name">
                        <span class="text-danger">{{$errors->first('author_name')}}</span>
                    </div>
                </div>

                <div class="row mx-0 pt-3 mb-3" style="padding-left: 15px;">
                    <div class="col-7">
                        <div class="bg-white content px-5 mr-3 w-100 pt-3 pb-2 " style="border: 1px solid #aaa;">
                            <div class="mb-4 pt-3 w-100">
                                <label for="content" class="w-25 mount-labels pb-2"
                                       style="vertical-align: top">Content</label>
                                <div class="standalone-container" id="content">
                                    <div id="snowcontainer"></div>

                                    <input type="text" value="{{old('content')}}" class="body" name="content" hidden>
                                    <input type="file" id="post-image" onclick="uploadImage(event)"  hidden>
                                </div>
                                <span class="text-danger">{{$errors->first('content')}}</span>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="ml-4 pl-1 mt-4">
                    <button type="submit" class="btn btn-danger pl-3" style="font-size: 16px!important;"
                            id="confirm-add-button"> Submit </button>

                </div>
                <div class="mb-4"></div>
            </form>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{asset('js/katex.min.js')}}"></script>
    <script src="{{asset('js/highlight.min.js')}}"></script>
    <script src="{{asset('js/quill.js')}}"></script>
    <script>

        let quill = new Quill('#snowcontainer', {
            modules: {
                toolbar: [
                    [{'header': [1, 2, 3, 4, 5, 6, false]}],
                    ['bold', 'italic'],
                    [{'align': []}],
                    [{'font': []}],
                    [{'list': 'ordered'}, {'list': 'bullet'}],
                    ['link', 'image'],
                    [{'indent': '-1'}, {'indent': '+1'}],
                ]
            },
            placeholder: 'Type content here...',
            theme: 'snow'
        });

        //for old input
        $(document).ready(function () {
            quill.root.innerHTML=$('.body').val();
        })

        $('#article_form').submit(function () {
            let content = quill.root.innerHTML;
            $('.body').val(content);

        });

        let imageHandler = function (image) {
            if (image) {
                let fileInput = document.getElementById('post-image');
                fileInput.click();
            }
        };
        quill.getModule('toolbar').addHandler('image', imageHandler);


        const host_name = '/api/download_image';

        function uploadImage(event) {
            let file = event.target.files[0];
            var formData = new FormData();
            let IMGUR_CLIENT_ID = '9a9dfefdfd55c90';
            let IMGUR_API_URL = 'https://api.imgur.com/3/image';
            formData.append('image', file);
            $.ajaxSetup({
                headers: {
                    // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    Authorization: 'Client-ID '+IMGUR_CLIENT_ID
                }
            });
            $.ajax({
                method: 'POST',
                url: IMGUR_API_URL,
                data: formData,
                processData: false,
                contentType: false
            }).then(function (response) {
                let imageUrl = response.data.link;
                if (imageUrl != null && imageUrl.length > 0) {
                    let value = imageUrl;
                    let addImgRange = quill.getSelection();
                    // value = value.indexOf('http') !== -1 ? value : 'http:' + value;
                    quill.insertEmbed(addImgRange != null ? addImgRange.index : 0, 'image', value, Quill.sources.USER)
                }
            })

        }
    </script>
@endsection
