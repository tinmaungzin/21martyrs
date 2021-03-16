@extends('layout.web.master')

@section('title', 'About Us')

@section('content')

    <div class = "aboutBody">

        <div class = "aboutPart">
            <h1>About us</h1>
            <h5>Objective</h5>
        </div>

        <div class = "contactUs">
            <div class = "contactUsQuestions">
                <div class = "contactUsHeaders">
                    <span>Name</span>
                </div>
            </div>
            <div class = "contactUsAnswers">
                <div class = "contactUsValues">
                    <input type = "text" placeholder="someone" name = "name">
                </div>
            </div>
            <div class = "contactUsQuestions">
                <div class = "contactUsHeaders">
                    <span>Mail</span>
                </div>
            </div>
            <div class = "contactUsAnswers">
                <div class = "contactUsValues">
                    <input type = "text" placeholder="someonone@something.com" name = "mail">
                </div>
            </div>
            <div class = "contactUsQuestions">
                <div class = "contactUsHeaders">
                    <span>Message</span>
                </div>
            </div>
            <div class = "contactUsAnswers">
                <div class = "contactUsValues">
                    <textarea type = "textarea"  name = "message"></textarea>
                </div>
            </div>
            <div class = "contactUsSubmit">
                <button type = "submit">Submit</button>
            </div>
        </div>
    </div>

@endsection
