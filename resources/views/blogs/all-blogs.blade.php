<?php
/**
 * @var \App\Models\Blog[] $blogs
 */
?>


@extends('layouts.main')

@section('title')Blogs @endsection

@section('content')
    <div class="album py-5 " style="text-align: center;">
        <h1 style="margin-bottom: 30px">Blogs</h1>
        <div class="container box-shadow">
            <div class="row mb-2">
                @foreach($blogs as $blog)
                    <div2 class="col-md-6">
                        <div class="card flex-md-row mb-4 box-shadow h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                                @foreach($blog->categories as $category)
                                    <strong class="d-inline-block mb-2 text-primary">{{$category->name}}</strong>
                                @endforeach
                                <h3 class="mb-0">
                                    <a class="text-dark" href="{{route('blog-view',$blog->slug)}}">{{$blog->title}}</a>
                                </h3>
                                <div class="mb-1 text-muted">{{$blog->created_at}}</div>
                                <div class="card-text mb-auto wrap-text">{{$blog->description}}</div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{route('blog-view',$blog->slug)}}" class="btn btn-sm btn-outline-secondary">View</a>
                                    </div>
                                </div>
                            </div>
                            <img class="card-img-right flex-auto d-none d-md-block" width="200" height="250" src="{{$blog->getPicture()}}">
                        </div>
                    </div2>
                @endforeach
            </div>
            @if(!count($blogs))
                <div class="container">
                    <img width="100" height="100" src="{{asset('/storage/files/system/no.jpg')}}" alt="">
                    <h1 style="margin-top: 50px">There are no blogs created yet</h1>
                </div>
            @endif
        </div>
        <div class="container">
            {{$blogs->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
@endsection

<style>
    .col-3{
        border: 1px solid red;
    }
    .wrap-text {
        word-break: break-all;
        height: 70px;
        overflow: hidden;
    }
    .col-md-6:hover{
        transform: scale(1.05);
        transition: 0.5s ease;
    }
    .container{
        min-height: 315px;
    }
</style>
