<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function index(): View
    {
        return view(
            'admin.main.index',
            [
                'countCategories' => Category::all()->count(),
                'countTags' => Tag::all()->count(),
                'countPosts' => Post::all()->count(),
                'countUsers' => User::all()->count(),
            ]
        );
    }
}
