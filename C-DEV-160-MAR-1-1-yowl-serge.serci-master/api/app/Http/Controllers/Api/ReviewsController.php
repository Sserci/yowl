<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reviews;
use Illuminate\Support\Facades\DB;


class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $review = Reviews::with('user', 'category')->get();
        return $review;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Reviews::create(array_merge($request->all(), ['user_id' => $request->user()->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = Reviews::with('comments', 'user', 'category')->find($id);
        return $review;
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
        $reviews = Reviews::find($id);
        $reviews->update($request->all());
        return $reviews;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Reviews::destroy($id);
    }
    public function count(){
        return Reviews::count();
    }
/*     public function average($id){
        $average = DB::table('articles')
                ->join('users', 'articles.user_id', '=', 'users.id')
                ->join('leagues', 'articles.cat_id', '=', 'leagues.id')
                ->where('articles.id', '=', $id)
                ->select('articles.*', 'users.name', 'users.phone_number', 'users.email', 'leagues.league')
                ->orderBy('created_at','desc')
                ->get();
    } */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function findComments($id)
    {
     $comments = Reviews::find($id)->comments;

     return $comments;
    }
}
