<?php

declare(strict_types=1);

namespace App\DTO\Post;

class PostDTO
{
    public function __construct(
        public int    $categoryId,
        public string $title,
        public string $shortDescription,
        public string $text,
        public bool   $hidden,
        public string $path,
        public array  $tags
    )
    {
    }
}
