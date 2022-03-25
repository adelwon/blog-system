<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function index(): View
    {
        return view('blog.pages.index',
            [
                'category' => Category::all(),
                'posts' => Post::query()->where('hidden', true)->orderByDesc('created_at')->paginate(6),
                'tags' => Tag::query()->where('hidden', true)->get()
            ]);
    }

    public function show($slug): View
    {
        $post = Post::query()->where('path', $slug)->first();

        return view('blog.pages.post',
            [
                'tags' => Tag::all(),
                'posts' => Post::query()->paginate(3),
            ], compact('post'));
    }

    public function showCategoryPosts($slug): View
    {
        $item = Category::query()->where('path', $slug)->first();

        return view('blog.pages.show',
            [
                'posts' => Post::query()->where('category_id', $item['id'])->paginate(6),
                'tags' => Tag::all(),
            ],
            compact('item')
        );
    }

    public function showTagPosts(Tag $item): View
    {
        $posts = Post::query()->whereHas('tags', function ($query) use ($item) {
            $query->whereIn('tags.id', $item);
        })->paginate(6);

        return view('blog.pages.show',
            [
                'tags' => Tag::all(),
            ],
            compact('posts', 'item')
        );
    }

    public function search(Request $request): View
    {
        $search = $request->input('search');

        $posts = Post::query()
            ->where(DB::raw('lower(title)'), 'LIKE', Str::lower("%{$search}%"))
            ->orWhere(DB::raw('lower(short_description)'), 'LIKE', Str::lower("%{$search}%"))
            ->orWhere(DB::raw('lower(text)'), 'LIKE', Str::lower("%{$search}%"))
            ->get();

        return view('blog.pages.search', ['tags' => Tag::all()], compact('posts', 'search'));
    }
}
