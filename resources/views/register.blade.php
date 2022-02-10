<?php
?>
@extends('layouts.main')

@section('title')Registration @endsection

@section('content')

    <div class="container">

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form class="form-signin" action="{{route('register-user')}}" method="post">
                @csrf
                <div class="text-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor"
                         class="bi bi-person-plus" viewBox="0 0 16 16">
                        <path
                            d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                        <path fill-rule="evenodd"
                              d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                    <h1 class="h3 mb-3 font-weight-normal">Registration</h1>
                </div>
                <div class="form-label-group">
                    <input type="text" name="name" id="inputName" class="form-control" placeholder="Name" autofocus="">
                    <label for="inputName">Name</label>
                </div>
                <div class="form-label-group">
                    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address"
                           required="" autofocus="">
                    <label for="inputEmail">Email address</label>
                </div>

                <div class="form-label-group">
                    <input type="password" name="password" id="inputPassword" class="form-control"
                           placeholder="Password" required="">
                    <label for="inputPassword">Password</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                <p class="mt-5 mb-3 text-muted text-center">© <?=date('Y')?></p>
            </form>

    </div>
@endsection
