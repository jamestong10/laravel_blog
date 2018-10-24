@extends('layouts.master')

@section('title')
  Create a new post
@endsection

@section('content')
  @include('layouts.errors')

  <h1>Create</h1>
  <hr>
  <form action="{{route('posts_store')}}" method="POST">
    @csrf
    <label for="title">標題</label>
    <input type="text" id="title" name="title" placeholder="Title">
    <br>
    <label for="body">內容</label>
    <textarea id="body" name="body" cols="30" rows="10" placeholder="Body"></textarea>
    <button type="submit">建立</button>
  </form>
@endsection