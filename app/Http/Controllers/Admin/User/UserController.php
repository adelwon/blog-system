<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UserCreateRequest;
use App\Http\Requests\Admin\User\UserUpdateRequest;
use App\Jobs\StoreUserJob;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::query()->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function create(): View
    {
        return view('admin.users.create', ['roles' => User::getRoles()]);
    }

    public function store(UserCreateRequest $userRequest): Redirector|Application|RedirectResponse
    {
        $userDto = $userRequest->getUserDTO();

        StoreUserJob::dispatch($userDto);

        return redirect(route('showUsers'))->with('success', trans('messages.general.add'));
    }

    public function show(User $user): View
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user): View
    {
        return view('admin.users.edit', ['roles' => User::getRoles()], compact('user'));
    }

    public function update(User $user, UserUpdateRequest $userRequest): RedirectResponse
    {
        $userDto = $userRequest->getUserDTO();
        $user->name = $userDto->name;
        $user->email = $userDto->email;
        $user->role = $userDto->role;
        $user->save();

        return redirect(route('showUsers'))->with('success', trans('messages.general.update'));
    }

    public function destroy(User $user): RedirectResponse
    {

        $user->delete();

        return redirect(route('showUsers'))->with('success', trans('messages.general.delete'));
    }
}
