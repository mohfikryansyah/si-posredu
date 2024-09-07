<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('Blog.index', [
            'posts' => Post::with('category')->where('id', '<>', $this->getPopulerPost())->latest()->paginate(5),
            'populer' => Post::with('category')->orderBy('views', 'desc')->first(),
            'categories' => $this->getCategories(),
            'app' => AppSetting::first(),
        ]);
    }

    private function getPopulerPost()
    {
        $populer = Post::with('category')->orderBy('views', 'desc')->first();
        if($populer){
            return $populer->id;
        }
        return null;
    }

    private function getCategories()
    {
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(5)->get();
        return $categories;
    }

    public function loadMore(Request $request)
    {
        if ($request->ajax()) {
            $posts = Post::latest()
                ->skip($request->skip)
                ->take(5)
                ->get();
            return view('Blog.loadMore', compact('posts'))->render();
        }
    }

    public function show($post)
    {
        $post = Post::with('category')->where('slug', $post)->first();
        $post->increment('views');
        $postTerkait = Post::with('category')
            ->where('category_id', $post->category->id)
            ->where('id', '<>', $post->id)
            ->orderBy('views', 'desc')
            ->take(3)
            ->get();
        // dd($postTerkait);
        return view('Blog.show', [
            'readPost' => $post,
            'postTerkaits' => $postTerkait,
            'posts' => Post::with('category')
                ->where('id', '<>', $this->getPopulerPost())
                ->where('id', '<>', $post->id)
                ->latest()
                ->paginate(5),
            'categories' => $this->getCategories(),
        ]);
    }

    public function search(Request $request)
    {
        // Tangkap keyword dan kategori dari inputan search
        $keyword = $request->input('keyword');
        $category = $request->input('category');

        $searchCategory = Category::where('title', $category)->first();
        // Query untuk mencari artikel berdasarkan keyword dan kategori
        $query = Post::query();

        // Filter berdasarkan kategori jika kategori bukan "Semua Kategori"
        if ($category && $category !== 'Semua Kategori') {
            $query->where('category_id', $searchCategory['id']);
        }

        // Filter berdasarkan keyword di judul atau konten
        $query->where(function ($q) use ($keyword) {
            $q->where('title', 'like', "%{$keyword}%")->orWhere('body', 'like', "%{$keyword}%");
        });

        // Dapatkan hasil pencarian
        $results = $query->get();

        $categories = $this->getCategories();
        // dd($keyword);

        // Kembalikan hasil pencarian ke view
        return view('Blog.result-search', compact('results', 'category', 'categories', 'keyword'));
    }
}
