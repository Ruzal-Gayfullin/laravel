<div class="container">
    @include('errors.form-errors')
    <form action="@yield('route')" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="My First Blog"
                   value="@yield('blog_title')">
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input name="slug" type="text" class="form-control" id="slug" placeholder="slug" value="@yield('slug')">
        </div>

        <div class="form-group">
            <label for="category_id">Category Id</label>
            <input name="category_id" type="text" class="form-control" id="category_id" placeholder="For Example: 1"
                   value="@yield('category_id')">
        </div>

        <div class="form-group">
            <label for="text">Text</label>
            <textarea name="text" class="form-control" id="text" rows="6">@yield('text')</textarea>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" rows="4"
                      placeholder="Max length 255">@yield('description')</textarea>
        </div>

        <div class="form-group">
            <label for="image">Picture</label>
            <input name="image" type="file" id="image" placeholder="1">
            @if(Route::getCurrentRoute()->named('blog-update'))
                <img class="card-img-right flex-auto d-none d-md-block" width="200" height="250"
                     src="@yield('picture')">
            @endif
        </div>


        <button type="submit" @class('btn btn-success')>Save</button>
    </form>
</div>
