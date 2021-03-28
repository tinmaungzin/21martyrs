<?php

namespace App\Http\Controllers;

use App\Models\PendingPost;
use Illuminate\Http\Request;

class RejectedPendingPostsController extends Controller
{
    public function rejected_pending_posts()
    {
        $posts = PendingPost::where('publishing_status','Rejected')
            ->orderBy('id','desc')->paginate(10);
        return view('admin.rejected_pending_posts.index',compact('posts'));
    }

    public function rejected_pending_post_confirm_form(PendingPost $pendingPost)
    {
        return view('admin.rejected_pending_posts.confirm',compact('pendingPost'));
    }
}
