<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Forum;

class ForumController extends Controller
{
    public function index(Request $request)
    {
        $query = Forum::query();

    // Check if a search query is provided and not empty
    if ($request->filled('search')) {
        $search = $request->input('search');
        $query->where(function ($subquery) use ($search) {
            $subquery->where('title', 'like', '%' . $search . '%')
                ->orWhere('short_description', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        });
    }
    $forums = $query->paginate(10);

    return view('admin.forums.index', compact('forums'));
       
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.forums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validation = $request->validate([
            'title' => 'required|max:30',
            'body' => 'required|min:10',
            'short_description' => 'required|min:5',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ], [
            'title.required' => 'The title field is required.',
            'title.max' => 'The title may not be greater than :max characters.',
            'body.required' => 'The body field is required.',
            'body.min' => 'The body must be at least :min characters.',
            'short_description.required' => 'The short description field is required.',
            'short_description.min' => 'The short description must be at least :min characters.',
            'image.required' => 'The image field is required.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: :values.'
        ]);
        $forum = new Forum();
        $forum->title = $request->title;
        $forum->body = $request->body;
        $forum->short_description = $request->short_description;
        $forum->user_id = $request->user_id;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/forums');
            $image->move($destinationPath,$name);
            $forum->image = $name;
        }
        $forum->save();

        return redirect()->route('admin.forums.index')->with('success','Forum created successfully');

    }
        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
$forum = Forum::find($id);
return view('admin.forums.edit',compact('forum') );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validation = $request->validate([
            'title' => 'required|max:30',
            'body' => 'required|min:10',
            'short_description' => 'required|min:5',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ], [
            'title.required' => 'The title field is required.',
            'title.max' => 'The title may not be greater than :max characters.',
            'body.required' => 'The body field is required.',
            'body.min' => 'The body must be at least :min characters.',
            'short_description.required' => 'The short description field is required.',
            'short_description.min' => 'The short description must be at least :min characters.',
            'image.required' => 'The image field is required.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: :values.'
        ]);
        $forum = Forum::find($id);
  
        if($request->hasFile('image')){
            if ($forum->image != null){
                if(file_exists(public_path('images/forums/'.$forum->image))){
                    unlink(public_path('images/forums/'.$forum->image));
                    }
                }
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/forums');
            $image->move($destinationPath,$name);
            $forum->image = $name;
        }
        $forum->title = $request->title;
        $forum->body = $request->body;
        $forum->short_description = $request->short_description;
        $forum->save();
        return redirect()->route('admin.forums.index')->with('success','Forum updated successfully');

    }
       /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $forum = Forum::find($id);
        if ($forum->image != null){
        if(file_exists(public_path('images/forums/'.$forum->image))){
            unlink(public_path('images/forums/'.$forum->image));
            }
        }
        $forum->delete();
        return redirect()->route('admin.forums.index')->with('success', 'Event deleted successfully');

    }
}
