<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryCreateRequest;
use App\Http\Requests\Admin\Category\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::query()->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    public function create(): View
    {
        $categories = Category::all();

        return view('admin.categories.create', compact('categories'));
    }

    public function store(CategoryCreateRequest $categoryRequest): Redirector|RedirectResponse
    {
        $categoryDto = $categoryRequest->getCategoryDTO();

        $category = new Category();
        $category->name = $categoryDto->name;
        $category->parent_id = $categoryDto->parentId;
        $category->hidden = $categoryDto->hidden;
        $category->path = $categoryDto->path;
        $category->save();

        return redirect(route('showCategories'))->with('success', trans('messages.general.add'));
    }

    public function show(Category $category): View
    {
        return view('category.show', ['posts' => $category->posts], compact('category'));
    }

    public function edit(Category $category): View
    {
        return view('admin.categories.edit', ['categories' => Category::all()], compact('category'));
    }

    public function update(Category $category, CategoryUpdateRequest $categoryRequest): RedirectResponse
    {
        $categoryDto = $categoryRequest->getCategoryDTO();

        $category->name = $categoryDto->name;
        $category->parent_id = $categoryDto->parentId;
        $category->hidden = $categoryDto->hidden;
        $category->path = $categoryDto->path;
        $category->save();

        return redirect(route('showCategories'))->with('success', trans('messages.general.update'));
    }

    public function destroy(Category $category): RedirectResponse
    {
        if ($category->children()->exists()) {
            return redirect(route('showCategories'))->with('danger', trans('messages.category.cannot_delete'));
        }

        if ($category->posts()->exists()) {
            return redirect(route('showCategories'))->with('danger', trans('messages.category.cannot_delete_with_posts'));
        }

        $category->delete();

        return redirect(route('showCategories'))->with('success', trans('messages.general.delete'));
    }
}
