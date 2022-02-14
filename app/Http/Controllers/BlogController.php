<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Image;

/**
 * @var Blog $blog
 */
class BlogController extends Controller
{
    public function ShowBlogForm()
    {
        return view('blogs.blog-create');
    }

    public function CreateBlog(BlogRequest $request)
    {
        $data = $request->all();

        $blog = Blog::create(array_merge($data, [
            'author_id' => \auth()->id(),
            'picture' => FileHelper::SaveImage($data['image'], (new Blog(['slug' => $data['slug']]))->getPicturePath()),
        ]));

        if ($blog->save()) {
            return redirect()->route('blog.blog-view', $blog->slug);
        }

        return view('blogs.blog-update');
    }

    public function MyBlogs()
    {
        $user = Auth::user();

        $blogs = $user->blogs()->paginate(10);

        return view('blogs.myblogs', ['blogs' => $blogs]);
    }

    public function BlogView($slug)
    {
        $blog = Blog::where(['slug' => $slug])->first();
        $blogs = Blog::with('author')->where('slug', '!=', $slug)->inRandomOrder()->limit(5)->get();

        return view('blogs.blog-view', ['blog' => $blog, 'latest_blogs' => $blogs]);
    }

    public function BlogUpdate($slug, Request $request)
    {
        $user = \auth()->user();

        $blog = Blog::where(['slug' => $slug])->first();

        if ($blog->author_id !== $user->id) {
            return redirect()->route('all-blogs');
        }

        $data = $request->all();

        if (count($data) && $request->isMethod('post')) {
            $blog->title = $data['title'];

            if ($blog->slug !== $data['slug']) {
                $old_path = FileHelper::getStoragePath(true) . Blog::PICTURE_PATH . DIRECTORY_SEPARATOR . $blog->slug;
                rename($old_path, (Str::replace($blog->slug, '', $old_path) . $data['slug']));
            }
            $blog->slug = $data['slug'];
            $blog->text = $data['text'];
            $blog->description = $data['description'];
            $blog->category_id = $data['category_id'];

            if (array_key_exists('image', $data) && $picture_name = FileHelper::SaveImage($data['image'], $blog->getPicturePath())) {
                $blog->picture = $picture_name;
            }
            $blog->save();
        }

        $blogs = Blog::all()->random(5);
        return view('blogs/blog-update', ['blog' => $blog, 'latest_blogs' => $blogs,]);
    }

    public function AllBlogs()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(10);

        return view('blogs/all-blogs', ['blogs' => $blogs]);
    }

}
