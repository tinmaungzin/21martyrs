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

    public function getPostData($pendingPost)
    {
//        $data['name'] = $pendingPost->name;
//        $data['comment'] = $pendingPost->comment;
//        $data['age'] = $pendingPost->age;
//        $data['status'] = $pendingPost->status;
//        $data['profile_url'] = $pendingPost->getAttributes()['profile_url'];
//        $data['gender'] = $pendingPost->gender;
//        $data['occupation'] = $pendingPost->occupation;
//        $data['organization_name'] = $pendingPost->organization_name;
//        $data['state_id'] = $pendingPost->state_id;
//        $data['address'] = $pendingPost->address;
//        $data['prison'] = $pendingPost->prison;
//        $data['detained_date'] = $pendingPost->detained_date;
//        $data['reason_of_dead'] = $pendingPost->reason_of_dead;
//        $data['reason_of_arrest'] = $pendingPost->reason_of_arrest;
        if($pendingPost['profile_url'] != '') $data['profile_url'] = $pendingPost->getAttributes()['profile_url'];
        foreach(['name','comment', 'age', 'gender', 'occupation', 'organization_name', 'status',
                    'state_id', 'prison', 'detained_date' ,'reason_of_arrest','reason_of_dead','address','released_date'
                ] as $field )
        {
            if($pendingPost[$field] != '') $data[$field] = $pendingPost[$field];
        }
        $data['admin_id'] = auth()->guard('admin')->user()->id;

        return $data;
    }

    public function getImageData($post)
    {
        $image_data['url'] = $post->profile_url;
        $image_data['post_id'] = $post->id;
        $image_data['post_type'] = 'Post';

        return $image_data;
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
                $post = Post::create($this->getPostData($pendingPost));
//                Image::create($this->getImageData($post));
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
