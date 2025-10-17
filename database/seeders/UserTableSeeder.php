<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Melioraweb admin',
            'email' => 'admin@melioraweb.com'
        ]);
    }
}
