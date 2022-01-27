<?php

declare(strict_types=1);

namespace App\DTO\Category;

class CategoryDTO
{
    public function __construct(
        public string $name,
        public bool   $hidden,
        public string $path,
        public ?int   $parentId = null,
    )
    {
    }
}
