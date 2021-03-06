<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\TagCreateRequest;
use App\Http\Requests\Tag\TagUpdateRequest;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class TagController extends Controller
{
    public function index(): View
    {
        $tags = Tag::query()->paginate(10);

        return view('admin.tags.index', compact('tags'));
    }

    public function create(): View
    {
        return view('admin.tags.create');
    }

    public function store(TagCreateRequest $tagRequest): Redirector|RedirectResponse
    {
        $tag = new Tag();

        $tagDto = $tagRequest->getTagDTO();
        $tag->name = $tagDto->name;
        $tag->hidden = $tagDto->hidden;
        $tag->save();

        return redirect(route('showTags'))->with('success', trans('messages.general.add'));
    }

    public function edit(Tag $tag): View
    {
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Tag $tag, TagUpdateRequest $tagRequest): RedirectResponse
    {
        $tagDto = $tagRequest->getTagDTO();

        $tag->name = $tagDto->name;
        $tag->hidden = $tagDto->hidden;
        $tag->save();

        return redirect(route('showTags'))->with('success', trans('messages.general.update'));
    }

    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->delete();

        return redirect(route('showTags'))->with('success', trans('messages.general.delete'));
    }
}
