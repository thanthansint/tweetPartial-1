<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TweetController extends Controller
{
    function show() {
        $tweets = DB::table('tweet')->get();
        return view("showTweets", [ "allTweets" => $tweets]);
    }

    function showTweet($id) {
        $tweets = DB::table('tweet')->get();
        if($id > sizeOf($tweets)) {
            return view("tweetError");
        }
        return view("showTweets", [ "allTweets" => [$tweets[$id]]]);
    }

    function addTweet(Request $request) {
        DB::insert("INSERT INTO tweet (author, content)
        VALUES ('$request->author','$request->content');");
        $tweets = DB::table('tweet')->get();
        return view("showTweets", [ "allTweets" => $tweets]);
    }

    function editTweet(Request $request) {
        DB::update ("UPDATE tweet set author = ?,content=? where id=?",["$request->author","$request->content",$request->id]);
        $tweets = DB::table('tweet')->get();
        return view("showTweets", [ "allTweets" => $tweets]);
    }

    function choose(Request $request) {
        switch ($request->input('submit')) {
            case 'Delete Tweet':
                $t = $this->deleteTweet($request);
                break;

            case 'Edit Tweet':
                $t = $this->editTweet($request);
                break;
        }
    }

    function deleteTweet(Request $request) {
        DB::delete("DELETE FROM tweet WHERE id=$request->id");
        $tweets = DB::table('tweet')->get();
        return view("showTweets", [ "allTweets" => $tweets]);
    }
}
