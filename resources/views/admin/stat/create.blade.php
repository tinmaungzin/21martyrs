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
                        <label for="" class="label-form mb-3" style="font-size: 17px!important;">Total Death</label>
                        <input type="number" class="input-form" style="border-radius: 6px;" name="total_death" value="{{old('total_death')}}"
                               placeholder="Total Death">
                        <span class="text-danger">{{$errors->first('total_death')}}</span>
                    </div>
                </div>
                <div class="row mx-0 pt-3 mb-3" style="padding-left: 15px;">
                    <div class="col-7">
                        <label for="" class="label-form mb-3" style="font-size: 17px!important;">Headshot</label>
                        <input type="number" class="input-form" style="border-radius: 6px;" name="headshot" value="{{old('headshot')}}"
                               placeholder="Headshot">
                        <span class="text-danger">{{$errors->first('headshot')}}</span>
                    </div>
                </div>
                <div class="row mx-0 pt-3 mb-3" style="padding-left: 15px;">
                    <div class="col-7">
                        <label for="" class="label-form mb-3" style="font-size: 17px!important;">Gunshot</label>
                        <input type="number" class="input-form" style="border-radius: 6px;" name="gunshot" value="{{old('gunshot')}}"
                               placeholder="Gunshot">
                        <span class="text-danger">{{$errors->first('gunshot')}}</span>
                    </div>
                </div>
                <div class="row mx-0 pt-3 mb-3" style="padding-left: 15px;">
                    <div class="col-7">
                        <label for="" class="label-form mb-3" style="font-size: 17px!important;">Assault</label>
                        <input type="number" class="input-form" style="border-radius: 6px;" name="assault" value="{{old('assault')}}"
                               placeholder="Assault">
                        <span class="text-danger">{{$errors->first('assault')}}</span>
                    </div>
                </div>
                <div class="row mx-0 pt-3 mb-3" style="padding-left: 15px;">
                    <div class="col-7">
                        <label for="" class="label-form mb-3" style="font-size: 17px!important;">Abducted</label>
                        <input type="number" class="input-form" style="border-radius: 6px;" name="abducted" value="{{old('abducted')}}"
                               placeholder="Abducted">
                        <span class="text-danger">{{$errors->first('abducted')}}</span>
                    </div>
                </div>
                <div class="row mx-0 pt-3 mb-3" style="padding-left: 15px;">
                    <div class="col-7">
                        <label for="" class="label-form mb-3" style="font-size: 17px!important;">Released</label>
                        <input type="number" class="input-form" style="border-radius: 6px;" name="released" value="{{old('released')}}"
                               placeholder="Released">
                        <span class="text-danger">{{$errors->first('released')}}</span>
                    </div>
                </div>
                <div class="row mx-0 pt-3 mb-3" style="padding-left: 15px;">
                    <div class="col-7">
                        <label for="" class="label-form mb-3" style="font-size: 17px!important;">Date</label>
                        <input type="date" class="input-form" style="border-radius: 6px;" name="date" value="{{old('date')}}"
                               placeholder="Released">
                        <span class="text-danger">{{$errors->first('date')}}</span>
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
