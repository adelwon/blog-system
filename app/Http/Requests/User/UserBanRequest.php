<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property-read User user injected by eloquent implicit model binding
 */
class UserBanRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'blocked_date' => [
                'required',
                'date_format:m/d/Y'
            ]
        ];
    }
}
