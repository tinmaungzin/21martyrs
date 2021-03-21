@extends('admin.layout.master')
@section('title', 'Add Stat For Today')
@section('content')
    <div class="main-container">
        <header class="header pl-2">
            <nav>
                <a href="#" class="a-clear text-dark fm-roboto fs17">Stats For Today</a>

            </nav>
        </header>
        <div>

            <form class="position-relative w-100 h-100 bg-white p-2 mt-3" method="post" action="{{route('stats.store')}}">
                @csrf
                <div class="row mx-0 pt-3 mb-3" style="padding-left: 15px;">
                    <div class="col-7">
                        <label for="" class="label-form mb-3" style="font-size: 17px!important;">Today Death</label>
                        <input type="number" class="input-form" style="border-radius: 6px;" name="today_dead" value="{{old('today_dead')}}"
                               placeholder="Today Death">
                        <span class="text-danger">{{$errors->first('today_dead')}}</span>
                    </div>
                </div>
                <div class="row mx-0 pt-3 mb-3" style="padding-left: 15px;">
                    <div class="col-7">
                        <label for="" class="label-form mb-3" style="font-size: 17px!important;">Today Detained</label>
                        <input type="number" class="input-form" style="border-radius: 6px;" name="today_detained" value="{{old('today_detained')}}"
                               placeholder="Today Detained">
                        <span class="text-danger">{{$errors->first('today_detained')}}</span>
                    </div>
                </div>
                <div class="row mx-0 pt-3 mb-3" style="padding-left: 15px;">
                    <div class="col-7">
                        <label for="" class="label-form mb-3" style="font-size: 17px!important;">Today Hurt</label>
                        <input type="number" class="input-form" style="border-radius: 6px;" name="today_hurt" value="{{old('today_hurt')}}"
                               placeholder="Today Hurt">
                        <span class="text-danger">{{$errors->first('today_hurt')}}</span>
                    </div>
                </div>
                <div class="row mx-0 pt-3 mb-3" style="padding-left: 15px;">
                    <div class="col-7">
                        <label for="" class="label-form mb-3" style="font-size: 17px!important;">Total Death</label>
                        <input type="number" class="input-form" style="border-radius: 6px;" name="total_dead" value="{{old('total_dead')}}"
                               placeholder="Total Death">
                        <span class="text-danger">{{$errors->first('total_dead')}}</span>
                    </div>
                </div>
                <div class="row mx-0 pt-3 mb-3" style="padding-left: 15px;">
                    <div class="col-7">
                        <label for="" class="label-form mb-3" style="font-size: 17px!important;">Total Detained</label>
                        <input type="number" class="input-form" style="border-radius: 6px;" name="total_detained" value="{{old('total_detained')}}"
                               placeholder="Total Detained">
                        <span class="text-danger">{{$errors->first('total_detained')}}</span>
                    </div>
                </div>
                <div class="row mx-0 pt-3 mb-3" style="padding-left: 15px;">
                    <div class="col-7">
                        <label for="" class="label-form mb-3" style="font-size: 17px!important;">Total Hurt</label>
                        <input type="number" class="input-form" style="border-radius: 6px;" name="total_hurt" value="{{old('total_hurt')}}"
                               placeholder="Total Hurt">
                        <span class="text-danger">{{$errors->first('total_hurt')}}</span>
                    </div>
                </div>



                <div class="ml-4 pl-1 mt-4">
                    <button type="submit" class="btn btn-danger pl-3" style="font-size: 16px!important;"
                            id="confirm-add-button"> Add Stats</button>

                </div>
                <div class="mb-4"></div>
            </form>
        </div>
    </div>
@endsection
