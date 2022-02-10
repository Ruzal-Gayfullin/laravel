<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow bg-light">
    <h5 class="my-0 mr-md-auto font-weight-normal"><a href="{{route('all-blogs')}}"> My Laravel Project</a></h5>
    @if(!auth()->check())
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="{{route('register')}}">Registration</a>
    </nav>
    <a class="btn btn-outline-primary" href="{{route('login')}}">Sign up</a>
    @else
<?php $current_route = Request::url();?>
    @if (route('all-blogs') !== $current_route)
        <a class="p-2 text-dark" href="{{route('all-blogs')}}">All Blogs</a>
    @endif

    @if (route('home') !== $current_route)
        @if (route('blog') !== $current_route)
        <a class="p-2 text-dark" href="{{route('blog')}}">My Blogs</a>
    @endif

        @if (route('home') !== $current_route)
            <a class="p-2 text-dark" href="{{route('home')}}">My Page</a>
        @endif
    @endif
        <a class="btn btn-outline-primary" href="{{route('log-out')}}">Log out</a>
    @endauth

</div>
<style>
    .bg-light {
        background-color: #f8f9fa!important;
    }
    .active{
        font-weight: bold;
    }
</style>
