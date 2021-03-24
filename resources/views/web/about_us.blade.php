@extends('web.layout.master')

@section('title', 'About Us')

@section('content')

    <div class="aboutBody">

        <div class="aboutPart">
            <h1>About us</h1>
            <p>{{ __('ui.about_us_paragraph') }}</p>
        </div>
        <div class="contactUs">
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
