<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class commentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $validation =$request->validate([
            'body' => 'required',
        ]);
        $comment= new Comment();
        $comment->body = $request->body;
        $comment->user_id = $request->user_id;
        $comment->forum_id = $request->forum_id;
        $comment->save();
        return redirect("/forums/$request->forum_id")->with('success','Comment created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
                $validation =$request->validate([
                    'body' => 'required',
                ]);
                $comment= Comment::find($id);
                $comment->body = $request->body;
                $comment->user_id = $request->user_id;
                $comment->forum_id = $request->forum_id;
                $comment->save();
                return redirect("/forums/$request->forum_id")->with('success','Comment updated successfully');
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
$comment = Comment::find($id);
$comment->delete();
return redirect("/forums/$comment->forum_id")->with('success','Comment deleted successfully');
    }
}
