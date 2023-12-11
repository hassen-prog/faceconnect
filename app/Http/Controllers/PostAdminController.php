<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;




class PostAdminController extends Controller
{
    public function indexPosts()
    {
        $profile=Profile::where('user_id', auth()->id())->first();
        $posts = Post::all();
        $user = auth()->user();
        return view('adminpost', compact('posts','profile','user'));
    }

    public function deletePost($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.post')->with('success', 'Post deleted successfully');
    }
}
