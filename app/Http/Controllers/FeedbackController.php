<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FeedbackController extends Controller
{

    public function index()
    {
        $feedbacks = Feedback::orderBy('id','desc')->paginate(10);
        return view('admin.feedback.index',compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(FeedbackRequest $request)
    {
        $data = $request->all();
        Feedback::create($data);
        Session::flash('msg', 'Message sent successfully! Thank You');
        return redirect()->back();
    }


    public function show(Feedback $feedback)
    {
        return view('admin.feedback.show',compact('feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
