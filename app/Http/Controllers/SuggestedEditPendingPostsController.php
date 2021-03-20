<?php

namespace App\Http\Controllers;

use App\Models\PendingPost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SuggestedEditPendingPostsController extends Controller
{
    public function suggested_edit_pending_posts()
    {
        $posts = PendingPost::where('post_id','!=',null)->where('publishing_status','None')
            ->orderBy('id','desc')->paginate(10);
        return view('admin.suggested_edit_pending_posts.index',compact('posts'));
    }

    public function suggested_edit_pending_post_confirm_form(PendingPost $pendingPost)
    {
        return view('admin.suggested_edit_pending_posts.confirm',compact('pendingPost'));

    }

    public function getPostData($pendingPost)
    {
        $data['name'] = $pendingPost->name;
        $data['comment'] = $pendingPost->comment;
        $data['age'] = $pendingPost->age;
        $data['profile_url'] = $pendingPost->profile_url;
        $data['gender'] = $pendingPost->gender;
        $data['occupation'] = $pendingPost->occupation;
        $data['organization_name'] = $pendingPost->organization_name;
        $data['city_id'] = $pendingPost->city_id;
        $data['state_id'] = $pendingPost->state_id;
        $data['prison'] = $pendingPost->prison;
        $data['detained_date'] = $pendingPost->detained_date;
        $data['reason_of_dead'] = $pendingPost->reason_of_dead;
        $data['reason_of_arrest'] = $pendingPost->reason_of_arrest;
        $data['admin_id'] = auth()->guard('admin')->user()->id;

        return $data;
    }

    public function handle_suggested_edit_pending_post(Request $request, PendingPost $pendingPost)
    {
        if($request->is_confirm)
        {
            $pendingPost->publishing_status = 'Confirmed';
            $pendingPost->save();
            DB::transaction(function() use($pendingPost)
            {
                $post = Post::FindOrFail($pendingPost->post_id);
                $post->update($this->getPostData($pendingPost));
//                $post->image->url = $post->profile_url;
//                $post->image->save();
            });
            Session::flash('msg','Post updated successfully!');
        }
        else
        {
            $pendingPost->publishing_status = 'Rejected';
            $pendingPost->save();
            Session::flash('err-msg','Post is transferred to rejected list!');

        }
        return redirect(route('list.suggested_edit_pending_posts'));
    }
}
