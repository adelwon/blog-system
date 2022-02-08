<?php

declare(strict_types=1);

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\View\View;
use function view;

class IndexController extends Controller
{
    public function index(): View
    {
        return view('account.main.index');
    }

    public function showProfile(): View
    {
        $user = $this->getUser();

        return view('account.profile', compact('user'));
    }

    private function getUser(): Authenticatable
    {
        return auth()->user();
    }
}
