
@extends('blogs.blog-form')
@extends('layouts.main')

@section('title')Create Blog @endsection

@section('content')
    <div class="container">
        <h1>Create Blog </h1>
        @section('route'){{route('blog-create')}} @endsection
    </div>
@endsection



