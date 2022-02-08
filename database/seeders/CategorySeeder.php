<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Articles',
                'parent_id' => null,
                'hidden' => '1',
                'path' => 'articles'
            ],
            [
                'name' => 'API',
                'parent_id' => '1',
                'hidden' => '1',
                'path' => 'api'
            ],
            [
                'name' => 'Blade',
                'parent_id' => '1',
                'hidden' => '1',
                'path' => 'blade'
            ],
            [
                'name' => 'Relationship',
                'parent_id' => '1',
                'hidden' => '0',
                'path' => 'relationship'
            ],
            [
                'name' => 'Patterns',
                'parent_id' => '1',
                'hidden' => '1',
                'path' => 'patterns'
            ],
            [
                'name' => 'Tutorial',
                'parent_id' => null,
                'hidden' => '1',
                'path' => 'tutorial'
            ],
            [
                'name' => 'PHP',
                'parent_id' => '6',
                'hidden' => '1',
                'path' => 'php'
            ],
            [
                'name' => 'Laravel',
                'parent_id' => '6',
                'hidden' => '1',
                'path' => 'laravel'
            ],
            [
                'name' => 'Events',
                'parent_id' => null,
                'hidden' => '1',
                'path' => 'events'
            ],
            [
                'name' => 'Meetups',
                'parent_id' => '9',
                'hidden' => '1',
                'path' => 'meetups'
            ],
            [
                'name' => 'Courses',
                'parent_id' => '9',
                'hidden' => '1',
                'path' => 'courses'
            ],
            [
                'name' => 'Conference',
                'parent_id' => '9',
                'hidden' => '1',
                'path' => 'conference'
            ],
            [
                'name' => 'Tags',
                'parent_id' => null,
                'hidden' => '1',
                'path' => 'tags'
            ],
            [
                'name' => 'Jobs',
                'parent_id' => null,
                'hidden' => '0',
                'path' => 'jobs'
            ]
        ];

        foreach ($categories as $category) {
            (new Category($category))->save();
        }
    }
}
