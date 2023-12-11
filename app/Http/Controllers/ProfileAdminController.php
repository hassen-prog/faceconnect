<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use App\Models\Post;
use App\Models\PostComment;


use Illuminate\Http\Request;

class ProfileAdminController extends Controller
{
    public function indexProfiles()
    {    $user = auth()->user();
        $profiles = Profile::all();
        return view('adminprofile', compact('profiles','user'));
    }

    public function showPosts($id)
    {
        $profile = Profile::findOrFail($id);
        $posts = $profile->posts;
        $comments = PostComment::all();

        return view('adminprofilepost', compact('profile', 'posts','comments'));
    }

    public function deleteProfile($id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();
        return redirect()->route('admin.profile')->with('success', 'Profile deleted successfully');
    }
}
