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
            padding: 50px;
            line-height: 150%;
            font-size: 18px;
        }

        .sub-body-style{
            text-align: justify;
            line-height: 150%;
            font-size: 18px;
            padding-left: 50px;
            padding-right: 50px;
        }
    </style>

    <div class="aboutBody" style="background-color: #f4f4f4">

        <div class="aboutPart" style="padding-top: 50px;">
            <div class="block">
                <h1 class="header-style">{{__('ui.about_us')}}</h1>
                <p class="body-style">{{ __('ui.about_us_paragraph') }}</p>
            </div>

            <div class="block">
                <h2 class="header-style">{{__('ui.how_information_collected')}}</h2>
                <p class="body-style">{{ __('ui.how_information_collected_paragraph') }}</p>
                <p class="sub-body-style">{{ __('ui.how_information_collected_paragraph_1') }}</p>
                <p class="sub-body-style">{{ __('ui.how_information_collected_paragraph_2') }}</p>
                <p class="sub-body-style">{{ __('ui.how_information_collected_paragraph_3') }}</p>
            </div>

            <div class="block">
                <h2 class="header-style">{{__('ui.how_information_used')}}</h2>
                <div style="padding-top: 50px;"></div>
                <p class="sub-body-style">{{ __('ui.how_information_used_paragraph_1') }}</p>
                <p class="sub-body-style">{{ __('ui.how_information_used_paragraph_2') }}</p>
                <p class="sub-body-style">{{ __('ui.how_information_used_paragraph_3') }}</p>
                <p class="sub-body-style">{{ __('ui.how_information_used_paragraph_4') }}</p>
            </div>

            <div class="block">
                <h2 class="header-style">{{__('ui.note_from_admins')}}</h2>
                <p class="body-style">{{ __('ui.note_from_admins_paragraph') }}</p>
            </div>


        </div>
        <div class="contactUs" style="text-align: center">
            <h3 class="contact-us-title">{{ __('ui.contact_us') }}</h3>
            <div class="contactUsQuestions">
                <div class="contactUsHeaders">
                    <span>{{ __('ui.name') }}</span>
                </div>
            </div>
            <div class="contactUsAnswers">
                <div class="contactUsValues">
                    <input type="text" placeholder="someone" name="name">
                </div>
            </div>
            <div class="contactUsQuestions">
                <div class="contactUsHeaders">
                    <span>{{ __('ui.email') }}</span>
                </div>
            </div>
            <div class="contactUsAnswers">
                <div class="contactUsValues">
                    <input type="text" placeholder="someonone@something.com" name="mail">
                </div>
            </div>
            <div class="contactUsQuestions">
                <div class="contactUsHeaders">
                    <span>{{ __('ui.message') }}</span>
                </div>
            </div>
            <div class="contactUsAnswers">
                <div class="contactUsValues">
                    <textarea type="textarea" name="message" placeholder="{{ __('ui.message_placeholder') }}"></textarea>
                </div>
            </div>
            <div class="contactUsSubmit">
                <button type="submit">{{ __('ui.submit') }}</button>
            </div>
        </div>
    </div>

@endsection
