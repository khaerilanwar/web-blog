<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    protected $postModel;

    public function __construct()
    {
        view()->share("categories", Category::all());
        $this->postModel = new Post();
    }

    public function index(Request $request): View
    {
        // Mengecek apakah user melakukan pencarian
        if ($request->has('search')) {
            $posts = $this->postModel->search($request->search)->orderBy('published_at', 'desc');
            $data = [
                "classPage" => "category-page",
                "posts" => $posts->paginate(6),
                "tags" => $this->postModel->getTags($posts->get()),
                "recentPosts" => $this->postModel->orderBy('published_at', 'desc')->take(5)->get(),
            ];

            return view('pages.blog.posts', $data);
        }

        // Jika tidak, tampilkan halaman utama blog
        else {
            $data = [
                "classPage" => "index-page",
            ];

            return view('pages.blog.index', $data);
        }
    }

    public function post(string $slugCategory, string $slugPost): View
    {
        $post = $this->postModel->getPostCategory($slugCategory, $slugPost);
        if (!$post) {
            abort(404);
        } else {
            $post->views += 1;
            $post->save();
            $post->content = str_replace("src=\"", "src=\"" . asset('assets/img/blog/') . '/', $post->content);
        }

        $data = [
            "classPage" => "single-post-page",
            "post" => $post,
            "recentPosts" => $this->postModel->orderBy('published_at', 'desc')->take(5)->get(),
            "tags" => $this->postModel->getTags(Category::where('slug', $slugCategory)->first()->posts),
        ];

        return view('pages.blog.post', $data);
    }

    public function posts(Category $category): View
    {
        $postCategory = $category->posts()->orderBy('published_at', 'desc');
        $data = [
            "classPage" => "category-page",
            "posts" => $postCategory->paginate(6),
            "category" => $category,
            "tags" => $this->postModel->getTags($postCategory->get()),
            "recentPosts" => $this->postModel->orderBy('published_at', 'desc')->take(5)->get(),
        ];

        return view('pages.blog.posts', $data);
    }
}
