<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\PostCreateRequest;
use App\Http\Requests\Admin\Post\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class PostController extends Controller
{
    public function index(): View
    {
        return view(
            'admin.posts.index',
            [
                'category' => Category::all(),
                'posts' => Post::query()->orderByDesc('created_at')->paginate(10),
                'users'=> User::all()
            ]
    );
    }

    public function create(): View
    {
        return view('admin.posts.create', [
                'categories' => Category::all(),
                'tags' => Tag::all()
            ]
        );
    }

    public function store(PostCreateRequest $postRequest): Redirector|RedirectResponse
    {
        $postDto = $postRequest->getPostDTO();

        $post = new Post();
        $post->title = $postDto->title;
        $post->category_id = $postDto->categoryId;
        $post->short_description = $postDto->shortDescription;
        $post->text = $postDto->text;
        $post->image = $postDto->image;
        $post->hidden = $postDto->hidden;
        $post->path = $postDto->path;
        $post->save();

        $post->tags()->attach($postDto->tags);

        return redirect(route('showPosts'))->with('success', trans('messages.general.add'));
    }

    public function show($slug): View
    {
        return view('admin.posts.show', [
            'tags' => Tag::all(),
            'post' => Post::query()->where('path', $slug)->first()
        ]);
    }

    public function edit(Post $post): View
    {
        return view(
            'admin.posts.edit',
            [
                'categories' => Category::all(),
                'tags' => Tag::all()
            ],
            compact('post')
        );
    }

    public function update(Post $post, PostUpdateRequest $postRequest): RedirectResponse
    {
        $postDto = $postRequest->getPostDTO();

        $post->title = $postDto->title;
        $post->category_id = $postDto->categoryId;
        $post->short_description = $postDto->shortDescription;
        $post->text = $postDto->text;
        $post->image = $postDto->image;
        $post->hidden = $postDto->hidden;
        $post->path = $postDto->path;
        $post->save();

        $post->tags()->sync($postDto->tags);

        return redirect(route('showPosts'))->with('success', trans('messages.general.update'));
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect(route('showPosts'))->with('success', trans('messages.general.delete'));
    }

    private function getUser(): Authenticatable
    {
        return auth()->user();
    }
}
