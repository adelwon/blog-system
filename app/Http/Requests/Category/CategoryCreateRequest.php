<?php

namespace App\Http\Requests\Category;

use App\DTO\Category\CategoryDTO;
use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                "unique:categories,name",
                'string'
            ],
            'hidden' => ['required', 'boolean'],
            'path' => [
                'required',
                "unique:categories,path",
                'string'
            ],
            'parent_id' => ['nullable', 'numeric']
        ];
    }

    public function getCategoryDTO(): CategoryDTO
    {
        return new CategoryDTO(
            $this->get('name'),
            (bool)$this->get('hidden'),
            $this->get('path'),
            $this->get('parent_id'),
        );
    }
}
