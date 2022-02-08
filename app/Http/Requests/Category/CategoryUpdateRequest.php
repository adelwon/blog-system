<?php

namespace App\Http\Requests\Category;

use App\DTO\Category\CategoryDTO;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property-read Category category injected by eloquent implicit model binding
 */
class CategoryUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                Rule::unique('categories')->ignore($this->category),
                'string'
            ],
            'hidden' => ['required', 'boolean'],
            'path' => [
                'required',
                Rule::unique('categories')->ignore($this->category),
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
