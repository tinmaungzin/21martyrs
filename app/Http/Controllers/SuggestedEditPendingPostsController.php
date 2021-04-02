<?php

namespace App\Http\Controllers;

use App\Models\PendingPost;
use App\Models\Post;
use App\Models\State;
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
        $states = State::all();
        return view('admin.suggested_edit_pending_posts.edit',compact('pendingPost','states'));

    }


    public function handle_suggested_edit_pending_post(Request $request, PendingPost $pendingPost)
    {

        if($request->is_confirm == 'true')
        {
            $pendingPost->informant_name = null;
            $pendingPost->informant_phone = null;
            $pendingPost->informant_association_with_victim = null;
            $pendingPost->publishing_status = 'Confirmed';
            $pendingPost->save();
            DB::transaction(function() use($pendingPost)
            {
                $post = Post::FindOrFail($pendingPost->post_id);
                $post->update(PendingPost::getPostData($pendingPost));
            });
            Session::flash('msg','Post updated successfully!');
        }
        if($request->is_confirm == 'false')
        {
            $pendingPost->publishing_status = 'Rejected';
            $pendingPost->save();
            Session::flash('err-msg','Post is transferred to rejected list!');

        }
        return redirect(route('list.suggested_edit_pending_posts'));
    }
}
