<?php

namespace App\Jobs;

use App\DTO\User\UserDTO;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StoreUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private UserDTO $userDto;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(UserDTO $userDto)
    {
        $this->userDto = $userDto;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = new User();
        $user->name = $this->userDto->name;
        $user->email = $this->userDto->email;
        $password = Str::random(10);
        $user->password = Hash::make($password);
        $user->role = $this->userDto->role;
        $user->save();

        Mail::to($user->email)->send(new PasswordMail($password, $user->email));
        event(new Registered($user));
    }
}
