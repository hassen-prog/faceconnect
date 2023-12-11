<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Profile;


class PostController extends Controller
{
   
    public function index()
    {
        $profile=Profile::where('user_id', auth()->id())->first();
        $posts = Post::all();
        $user = auth()->user();
        if ($profile){
        return view('user', compact('posts','profile','user'));
    }else{
        return view('profiles.create');

    }
    }

    public function create()
    {
        
        return view('posts.create');
    }

    public function store(Request $request)
{

    $request->validate([
        'description' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ], [
        'description.required' => 'La description est obligatoire',
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $storagePath = 'images/';
        $imageName = time() . rand(1, 99) . '.' . $image->getClientOriginalExtension();
        $image->move($storagePath, $imageName);
    }
     $profile=Profile::where('user_id', auth()->id())->first();
    if(!$profile){
        return redirect()->route('profile.create');

    }
     $newPost = new Post([
         'description' => $request->input('description'),
        'image' => $imageName, 
    ]);
    $newPost->profile_id = $profile->id;
    $newPost->save();
    return redirect()->route('user')->with('success', 'Ajout avec succès');
}


    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ], [
            'description.required' => 'La description est obligatoire',
        ]);
    
        $data = $request->all(); 
 
        $Post = Post::find($id);
        $Post->update($data);
        return redirect()->route('posts.index')->with('success', 'Modification avec succés');
    }

    public function destroy($id)
    {
        // Delete a post
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('user');
    }






    public function show($id)
{
    // Retrieve the post with the given ID
    $post = Post::find($id);

    if (!$post) {
        return redirect()->route('posts.index')->with('error', 'Post not found.');
    }
    $comments = $post->comments;
    return view('posts.show', compact('post','comments'));
}

}
