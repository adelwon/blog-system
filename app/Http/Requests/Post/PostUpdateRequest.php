<?php

namespace App\Http\Requests\Post;

use App\DTO\Post\PostDTO;
use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property-read Post post injected by eloquent implicit model binding
 */
class PostUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'numeric'],
            'title' => [
                'required',
                Rule::unique('posts')->ignore($this->post),
                'string',
                'max:120'
            ],
            'short_description' => [
                'required',
                'string',
                'max:200'
            ],
            'text' => [
                'required',
                'string',
            ],
            'image' => [
                'image',
                'max:3072'
            ],
            'path' => [
                'required',
                Rule::unique('posts')->ignore($this->post),
                'string'
            ]
        ];
    }

    public function getPostDTO(): PostDTO
    {
        return new PostDTO(
            $this->get('category_id'),
            $this->get('title'),
            $this->get('short_description'),
            $this->get('text'),
            (bool)$this->get('hidden'),
            $this->get('path'),
            $this->get('tags')
        );
    }
}
