<?php
$user = @auth()->user()
    ?>
@extends('layouts.main')

@section('title')Home @endsection

@section('content')
    <div class="container box-shadow">
{{--        <h1>Home Page</h1>--}}
        <div class="row mb-2">
            <div class="col-md-3">
                <ul>
                    <li class="{{ Route::getCurrentRoute()->named('home') ? 'active' : '' }}"><a href="{{route('home')}}">My Page</a></li>
                    <li class="{{Route::getCurrentRoute()->named('blog') ? 'active' : '' }}"><a href="{{route('blog')}}">My Blogs</a></li>
                    <li class="{{ Route::getCurrentRoute()->named('blog-create') ? 'active' : '' }}"><a href="{{route('blog-create')}}">Create New Post</a></li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-4">
                        <img src="{{$user->getPicture()}}"  width="200" height="200" alt="">
                    </div>
                    <div class="col-8">
                        <h3>[{{$user->id}}]  {{$user->getFullName()}}</h3>
                        <h5>Дата регистрации: {{$user->created_at}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    li {
        list-style-type: none;
    }
    /*a,a:hover {*/
    /*    color: black !important;*/
    /*    text-decoration: none;*/
    /*}*/

    .container{
        height: 100vh;
    }
    .active{
        font-weight: bold;
    }
</style>
