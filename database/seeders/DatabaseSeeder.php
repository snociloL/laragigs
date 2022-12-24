<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
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
         \App\Models\User::factory(5)->create();
         Listing::factory(6)->create();

        //  Listing::create([
        //     'title' => 'Laravel Senior Developer',
        //     'tags' => 'laravel, javascript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston, NA',
        //     'email' => 'email@email.com',
        //     'website' => 'https://gist.github.com/bradtraversy/c831baaad44343cc945e76c2e30927b3',
        //     'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        //  ]);

        //  Listing::create([
        //     'title' => 'Full Stack Engineer',
        //     'tags' => 'laravel, backend, api',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston, NA',
        //     'email' => 'email@email.com',
        //     'website' => 'https://gist.github.com/bradtraversy/c831baaad44343cc945e76c2e30927b3',
        //     'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        //  ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
