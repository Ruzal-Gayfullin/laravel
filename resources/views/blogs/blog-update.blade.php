<?php
/**
* @var \App\Models\Blog $blog
 */
$user = @auth()->user()
?>
@extends('blogs.blog-form')
@extends('layouts.main')

@section('title')Home @endsection

@section('content')
    <div class="container">
        <h1>Blog Update</h1>
        <a class="btn btn-primary" href="{{route('blog.blog-view',$blog->slug)}}">Go to Blog</a>
        @section('route'){{route('blog.blog-update',$blog->slug)}} @endsection
        @section('blog_title') {{$blog->title}} @endsection
        @section('slug') {{$blog->slug}} @endsection
        @section('author_id') {{$blog->author_id}} @endsection
        @section('category_id') {{$blog->category_id}} @endsection
        @section('text') {{$blog->text}} @endsection
        @section('description') {{$blog->description}} @endsection
        @section('picture') {{$blog->getPicture()}} @endsection
    </div>
@endsection


