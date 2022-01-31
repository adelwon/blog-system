<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
                'name' => 'laravel',
                'hidden' => '1'
            ],
            [
                'name' => 'php',
                'hidden' => '1'
            ],
            [
                'name' => 'oop',
                'hidden' => '1'
            ],
            [
                'name' => 'git',
                'hidden' => '1'
            ],
            [
                'name' => 'html',
                'hidden' => '0'
            ],
            [
                'name' => 'developer',
                'hidden' => '1'
            ],
            [
                'name' => 'switch',
                'hidden' => '0'
            ],
            [
                'name' => 'sql',
                'hidden' => '1'
            ],
            [
                'name' => 'project',
                'hidden' => '1'
            ],
            [
                'name' => 'english',
                'hidden' => '1'
            ],
            [
                'name' => 'learn',
                'hidden' => '1'
            ]
        ];

        foreach ($tags as $tag) {
            (new Tag($tag))->save();
        }
    }
}
