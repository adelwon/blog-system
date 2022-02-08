<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Administrator',
                'email' => 'blog@system.admin',
                'password' => '$2y$10$72IOboY6NJXkgMu2hpfYyu4GpVglXGe94JZTOgvXOd0azEZ',
                'role' => '0'
            ],
            [
                'name' => 'Scott Little',
                'email' => 'scott.little@example.com',
                'password' => '$2y$10$72IOboY6NJXkgMu2hpfYyu4GpVglXGe94JZTOgvXOd0azEZ',
                'role' => '1'
            ],
            [
                'name' => 'Dwayne Griffin',
                'email' => 'dwayne.griffin@example.com',
                'password' => '$2y$10$72IOboY6NJXkgMu2hpfYyu4GpVglXGe94JZTOgvXOd0azEZ',
                'role' => '1'
            ],
            [
                'name' => 'Josephine Hawkins',
                'email' => 'josephine.hawkins@example.com',
                'password' => '$2y$10$72IOboY6NJXkgMu2hpfYyu4GpVglXGe94JZTOgvXOd0azEZ',
                'role' => '1'
            ],
            [
                'name' => 'Becky Hopkins',
                'email' => 'becky.hopkins@example.com',
                'password' => '$2y$10$72IOboY6NJXkgMu2hpfYyu4GpVglXGe94JZTOgvXOd0azEZ',
                'role' => '1'
            ],
            [
                'name' => 'Michelle Howard',
                'email' => 'michelle.howard@example.com',
                'password' => '$2y$10$72IOboY6NJXkgMu2hpfYyu4GpVglXGe94JZTOgvXOd0azEZ',
                'role' => '1'
            ],
            [
                'name' => 'Brittany Bell',
                'email' => 'brittany.bell@example.com',
                'password' => '$2y$10$72IOboY6NJXkgMu2hpfYyu4GpVglXGe94JZTOgvXOd0azEZ',
                'role' => '1'
            ],
            [
                'name' => 'Laurie Jennings',
                'email' => 'laurie.jennings@example.com',
                'password' => '$2y$10$72IOboY6NJXkgMu2hpfYyu4GpVglXGe94JZTOgvXOd0azEZ',
                'role' => '1'
            ]

        ];

        foreach ($users as $user) {
            (new User($user))->save();
        }
    }
}
