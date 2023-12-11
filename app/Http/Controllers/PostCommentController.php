<?php

namespace App\Http\Controllers;
use App\Models\PostComment;
use App\Models\Profile;
use App\Models\Post;

use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function index()
    {   $profile=Profile::where('user_id', auth()->id())->first();
        $user = auth()->user();
        $comments = PostComment::all();
        return view('posts.show', compact('comments'));
    }

    public function create()
    {
        return view('comments.create');
    }






    public function storee(Request $request , $id )
    {
    
        $request->validate([
            'comment' => 'required|string|max:255',
        ], [
            'comment.required' => 'type a comment !',
        ]);
    
         $profile=Profile::where('user_id', auth()->id())->first();
        if(!$profile){
            return redirect()->route('profile.create');
        }
        $newComment = new PostComment([
             'comment' => $request->input('comment'),
        ]);
        $post = Post::find($id);
        $newComment->profile_id = $profile->id;
        $newComment->post_id = $post->id;

         $newComment->save();
       
        return redirect()->route('posts.show', $id)->with('success', 'Ajout avec succès');
    }






    public function edit($id)
    {
        $comment = PostComment::findOrFail($id);
        return view('comments.edit', compact('comment'));
    }






    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $request->validate([
            'comment' => 'required|string',
        ]);

        $comment = PostComment::findOrFail($id);

        // Update the comment
        $comment->update([
            'comment' => $request->input('comment'),
        ]);

        return redirect()->route('posts.show', $id)->with('success', 'Comment updated successfully');
    }









    public function destroy($id)
    {
        $comment = PostComment::findOrFail($id);
        $comment->delete();
        $idd = $comment->post_id;

        return redirect()->route('posts.show', $idd)->with('success', 'Comment deleted successfully');
    }
}
