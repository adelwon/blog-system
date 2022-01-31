<?php

namespace App\Http\Requests\Admin\Tag;

use App\DTO\Tag\TagDTO;
use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property-read Tag tag injected by eloquent implicit model binding
 */
class TagUpdateRequest extends FormRequest
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
            (bool)$this->get('hidden')
        );
    }
}
