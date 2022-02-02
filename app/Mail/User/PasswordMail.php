<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public string $password;
    public string $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($password, $name)
    {
        $this->password = $password;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): static
    {
        $name = $this->name;

        return $this->markdown('mail.user.password', compact('name'));
    }
}
