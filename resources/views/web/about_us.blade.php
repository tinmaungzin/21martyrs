@extends('web.layout.master')

@section('title', 'About Us')

@section('content')
    <style>
        .block{
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .header-style{
            text-align: center;
        }
        .body-style{
            text-align: justify;
            padding: 40px 50px 10px 30px;
            line-height: 35px;
            font-size: 17px;
        }

        .sub-body-style{
            text-align: justify;
    line-height: 30px;
    font-size: 17px;
    padding-left: 50px;
    padding-right: 50px;
        }
        hr{
            border-top: 1px solid #f8dfdf !important;
        }
    </style>

    <div class="aboutBody" style="background-color: #f4f4f4">

        <div class="aboutPart" style="padding-top: 30px;">
            <div class="block">
                <h2 class="header-style">{{__('ui.about_us')}}</h2>
                <p class="body-style">{{ __('ui.about_us_paragraph') }}</p>
            </div>
            <hr>
            <div class="block">
                <h2 class="header-style">{{__('ui.how_information_collected')}}</h2>
                <p class="body-style">{{ __('ui.how_information_collected_paragraph') }}</p>
                <p class="sub-body-style">{{ __('ui.how_information_collected_paragraph_1') }}</p>
                <p class="sub-body-style">{{ __('ui.how_information_collected_paragraph_2') }}</p>
                <p class="sub-body-style">{{ __('ui.how_information_collected_paragraph_3') }}</p>
            </div>
            <hr>

            <div class="block">
                <h2 class="header-style">{{__('ui.how_information_used')}}</h2>
                <div style="padding-top: 50px;"></div>
                <p class="sub-body-style">{{ __('ui.how_information_used_paragraph_1') }}</p>
                <p class="sub-body-style">{{ __('ui.how_information_used_paragraph_2') }}</p>
                <p class="sub-body-style">{{ __('ui.how_information_used_paragraph_3') }}</p>
                <p class="sub-body-style">{{ __('ui.how_information_used_paragraph_4') }}</p>
            </div>
            <hr>

            <div class="block">
                <h2 class="header-style">{{__('ui.note_from_admins')}}</h2>
                <p class="body-style">{{ __('ui.note_from_admins_paragraph') }}</p>
            </div>


        </div>

    </div>
    @include('web.layout.success_msg')


@endsection
