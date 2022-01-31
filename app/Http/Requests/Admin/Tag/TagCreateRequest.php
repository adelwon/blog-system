<?php

namespace App\Http\Requests\Admin\Tag;

use App\DTO\Tag\TagDTO;
use Illuminate\Foundation\Http\FormRequest;

class TagCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string'
            ],
            'hidden' => ['required', 'boolean']
        ];
    }

    public function getTagDTO(): TagDTO
    {
        return new TagDTO(
            $this->get('name'),
            (bool)$this->get('hidden'),
        );
    }
}
