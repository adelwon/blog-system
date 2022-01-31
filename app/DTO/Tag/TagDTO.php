<?php

declare(strict_types=1);

namespace App\DTO\Tag;

class TagDTO
{
    public function __construct(
        public string $name,
        public bool   $hidden
    )
    {
    }
}
