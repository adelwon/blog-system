<?php

namespace App\Http\Requests\Admin\User;

use App\DTO\User\UserDTO;
use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                "unique:users,name",
                'string'
            ],
            'email' => [
                'required',
                "unique:users,email",
                'string'
            ],
            'role' => [
                'required',
                'integer'
            ]
        ];
    }

    public function getUserDTO(): UserDTO
    {
        return new UserDTO(
            $this->get('name'),
            $this->get('email'),
            $this->get('role')
        );
    }
}
