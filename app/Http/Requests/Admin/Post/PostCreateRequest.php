<?php

namespace App\Http\Requests\Admin\Post;

use App\DTO\Post\PostDTO;
use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'numeric', 'exists:categories,id'],
            'title' => [
                'required',
                "unique:posts,title",
                'string'
            ],
            'short_description' => [
                'required',
                'string'
            ],
            'text' => [
                'required',
                'string',
                'max:3000'
            ],
            'image' => [
                'required',
                'image',
                'max:3072'
            ],
            'hidden' => ['required', 'boolean'],
            'path' => [
                'required',
                "unique:posts,path",
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
            $this->file('image')->store('uploads', 'public'),
            (bool) $this->get('hidden'),
            $this->get('path'),
            $this->get('tags')
        );
    }
}
