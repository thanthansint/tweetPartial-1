<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LayoutController extends Controller
{

        function showTweet($id) {
            $tweets = DB::table('tweet')->get();
            if($id > sizeOf($tweets)) {
                return view("tweetError");
            }
            return view("showLayoutTweet", [ "allTweets" => [$tweets[$id]]]);
        }

}
