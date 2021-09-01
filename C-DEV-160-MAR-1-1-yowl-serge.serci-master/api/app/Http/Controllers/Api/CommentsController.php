<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Reviews;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $reviews = Reviews::find();
     $comments = $reviews-> comments()->get();

     return $comments;
     
     
      /*   $comments= DB::table('comments')
        ->join("reviews", "comments.reviews_id", "=", "comments.id" )
        ->select("comments.*")
        ->where("comments.reviews_id",  "=", "reviews.id" )
        ->get(); */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Comments::create(array_merge($request->all(), ['user_id' => $request->user()->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comments $comments
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comments::with('comment', 'user')->find($id);
        return $comment;
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comments $comments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comments = Comments::find($id);
        $comments->update($request->all());
        return $comments;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comments $comments
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Comments::destroy($id);
    }
}