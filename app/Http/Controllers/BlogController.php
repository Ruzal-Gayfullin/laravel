<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;

/**
 * @var Blog $blog
 */
class BlogController extends Controller
{
    public function CreateBlog(Request $request){
        $data = $request->all();
        $blog = new Blog();
//dd($data);
        if (count($data)) {
            $blog->title = $data['title'];
            /**TODO if change slug ->change->file directory*/
            $blog->slug = $data['slug'];
            $blog->text = $data['text'];
            $blog->author_id = \auth()->user()->id;
            $blog->text = $data['text'];
            $blog->description = $data['description'];
            $blog->category_id = $data['category_id'];

            if (array_key_exists('image', $data) && $picture_name = FileHelper::SaveImage($data['image'], $blog->getPicturePath())) {
                $blog->picture = $picture_name;
            }
           if($blog->save()){
          return redirect()->route('blog-view',$blog->slug);
           }
        }
        return view('blogs/blog-create');
}
    public function MyBlogs()
    {
        $user = Auth::user();

        $blogs = $user->blogs;

        return view('blogs/blogs', ['blogs' => $blogs]);
    }

    public function BlogView($slug)
    {
        $blog = Blog::where(['slug' => $slug])->first();
        $blogs = Blog::with('author')->where('slug', '!=', $slug)->inRandomOrder()->limit(5)->get();

        return view('blogs/blog-view', ['blog' => $blog, 'latest_blogs' => $blogs]);
    }

    public function BlogUpdate($slug, Request $request)
    {
        $blog = Blog::where(['slug' => $slug])->first();

        $data = $request->all();

        if (count($data)) {
            $blog->title = $data['title'];
            /**TODO if change slug ->change->file directory*/
            $blog->slug = $data['slug'];
            $blog->text = $data['text'];
            $blog->author_id = $data['author_id'];
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

}
