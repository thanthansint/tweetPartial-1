@extends('master')
@section('title')
Tweets
@endsection
@section('content')

@foreach ($allTweets as $tweet)
    <p>{{ $tweet->content }}</p>
    <p><strong>{{ $tweet->author }}</strong></p>
    <form action="/deletePost" method="post">
        @csrf
        <button name="id" type="submit" value="{{ $tweet->id }}" >Delete Post</button>
    </form>
    <form action="/" method="post">
        @csrf
        <input type="text" name="author" value="author">
        <input type="text" name="content" value="tweet">
        <input type="hidden" name="id" value="{{ $tweet->id }}">
        <input type="submit" name="submit" value="Edit Tweet">
    </form>
@endforeach

@include('header')

@include('tweetForm')


@endsection
