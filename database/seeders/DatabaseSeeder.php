<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        \App\Models\Categorie::factory(10)->create();
        \App\Models\Jeu::factory(10)->create();
        \App\Models\Tag::factory(50)->create();
        $jeux = \App\Models\Jeu::all();
        foreach ($jeux as $jeu){
            $jeu->tags()->attach('1');
        }
        
    }
}
