<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewPendingPostConfirmRequest;
use App\Models\Image;
use App\Models\PendingPost;
use App\Models\Post;
use App\Models\State;
use App\Utility\ImageModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class NewPendingPostsController extends Controller
{
    public function new_pending_posts()
    {
        $posts = PendingPost::where('post_id',null)->where('publishing_status','None')
            ->orderBy('id','desc')->paginate(10);
        return view('admin.new_pending_posts.index',compact('posts'));
    }

    public function new_pending_post_confirm_form(PendingPost $pendingPost)
    {
        $states = State::all();
        return view('admin.new_pending_posts.edit',compact('pendingPost','states'));

    }


    public function handle_new_pending_post(NewPendingPostConfirmRequest $request, PendingPost $pendingPost)
    {
        if($request->is_confirm == 'true')
        {
            $data = $request->except('is_confirm','photo');
            if($request->has('photo'))
            {
                $path = Str::uuid() . '-' . $request->file('photo')->getClientOriginalName();
                $data['profile_url'] = ImageModule::uploadFromRequest('photo', $path);
            }
            $pendingPost->update($data);
            $pendingPost->informant_name = null;
            $pendingPost->informant_phone = null;
            $pendingPost->informant_association_with_victim = null;
            $pendingPost->publishing_status = 'Confirmed';
            $pendingPost->save();
            DB::transaction(function() use($pendingPost)
            {
                $post = Post::create(PendingPost::getPostData($pendingPost));
            });


            Session::flash('msg','Post published successfully!');
        }
        if($request->is_confirm == 'false')
        {
            $pendingPost->informant_name = null;
            $pendingPost->informant_phone = null;
            $pendingPost->informant_association_with_victim = null;
            $pendingPost->publishing_status = 'Rejected';
            $pendingPost->save();
            Session::flash('err-msg','Post is transferred to rejected list!');

        }
        return redirect(route('list.new_pending_posts'));
    }
}
