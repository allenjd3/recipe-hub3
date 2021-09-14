<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory()->count(5)->create();

        foreach ($users as $user) {
            Recipe::factory()->count(10)->create([
                'user_id' => $user->id
            ]);
        }
    }
}
