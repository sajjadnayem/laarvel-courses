<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Course;
use App\Models\Platform;
use App\Models\Series;
use App\Models\Topic;
use App\Models\User;
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
        if (env('APP_ENV') === 'local') {
            $series = ['Laravel', 'Vue', 'React', 'Bootstrap', 'Tailwind'];
            //create series
            foreach($series as $item){
                Series::create([
                    'name' => $item,
                ]);
            }

            $topics = ['Eloquent', 'validation', 'Authentication', 'Testing', 'Deployment', 'Routing'];
            //create topics
            foreach($topics as $item){
                Topic::create([
                    'name' => $item,
                ]);
            }
            $platforms = ['Laracasts', 'Youtube', 'LaraJobs', 'LaraNews', 'LaraForum', 'LaraChat'];
            //create platforms
            foreach($platforms as $item){
                Platform::create([
                    'name' => $item,
                ]);
            }


            //create 50 users
            User::factory(50)->create();

            //create 100 courses
            Course::factory(100)->create();
        }


    }
}
