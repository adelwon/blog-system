<?php

namespace App\Http\Requests\Admin\User;

use App\DTO\User\UserDTO;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property-read User user injected by eloquent implicit model binding
 */
class UserUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                Rule::unique('users')->ignore($this->user),
                'string'
            ],
            'email' => [
                'required',
                Rule::unique('users')->ignore($this->user),
                'string'
            ]
        ];
    }

    public function getUserDTO(): UserDTO
    {
        return new UserDTO(
            $this->get('name'),
            $this->get('email'),
            $this->get('password'),
        );
    }
}
