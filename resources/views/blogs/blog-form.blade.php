<div class="container">

    <form action="@yield('route')" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="My First Blog"
                   value="@yield('blog_title'){{old('title')}}">
            <x-field-error field="title" message="{{$message ?? ''}}"></x-field-error>
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input name="slug" type="text" class="form-control" id="slug" placeholder="slug" value="@yield('slug'){{old('slug')}}">
            <x-field-error field="slug" message="{{$message ?? ''}}"></x-field-error>
        </div>

        <div class="form-group">
            <label for="category_id">Category Id</label>
            <input name="category_id" type="text" class="form-control" id="category_id" placeholder="For Example: 1"
                   value="@yield('category_id'){{old('category_id')}}">
            <x-field-error field="category_id" message="{{$message ?? ''}}"></x-field-error>
        </div>

        <div class="form-group">
            <label for="text">Text</label>
            <textarea name="text" class="form-control" id="text" rows="6">@yield('text'){{old('text')}}</textarea>
            <x-field-error field="text" message="{{$message ?? ''}}"></x-field-error>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" rows="4"
                      placeholder="Max length 255">@yield('description'){{old('description')}}</textarea>
            <x-field-error field="description" message="{{$message ?? ''}}"></x-field-error>
        </div>

        <div class="form-group">
            <label for="image">Picture</label>
            <input name="image" type="file" id="image" placeholder="1">
            <x-field-error field="image" message="{{$message ?? ''}}"></x-field-error>
            @if(Route::getCurrentRoute()->named('blog-update'))
                <img class="card-img-right flex-auto d-none d-md-block" width="200" height="250"
                     src="@yield('image')">
            @endif
        </div>


        <button type="submit" @class('btn btn-success')>Save</button>
    </form>
</div>
