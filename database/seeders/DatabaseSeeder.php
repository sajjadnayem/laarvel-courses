<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Author;
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
     * @throws \Exception
     */
    public function run()
    {
        if (env('APP_ENV') === 'local') {
            $series = ['Laravel', 'Vue', 'React', 'Bootstrap', 'Tailwind'];
            $series = [
               [
                   'name' => 'Laravel',
                   'image' => 'https://cdn.pixabay.com/photo/2017/08/05/11/16/logo-2582748_960_720.png',
               ],
               [
                   'name' => 'Vue',
                   'image' => 'https://cdn.pixabay.com/photo/2017/08/05/11/16/logo-2582747_960_720.png',
               ],
               [
                   'name' => 'React',
                   'image' => 'https://cdn.pixabay.com/photo/2017/08/05/11/16/logo-2582748_960_720.png',
               ],
               [
                   'name' => 'Bootstrap',
                   'image' => 'https://cdn.pixabay.com/photo/2017/08/05/11/16/logo-2582747_960_720.png',
               ],
               [
                   'name' => 'Tailwind',
                   'image' => 'https://cdn.pixabay.com/photo/2017/08/05/11/16/logo-2582748_960_720.png',
               ],

            ];
            //create series
            foreach($series as $item){
                Series::create([
                    'name' => $item['name'],
                    'image' => $item['image'],
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

            $authors = ['Sajjad Nayem', 'Rasel Ahmed', 'Rakibul Islam', 'Harun Raihan', 'Sakib Ahmed'];
            foreach ($authors as $item){
                Author::create([
                    'name' => $item,
                ]);
            }


            //create 50 users
            User::factory(50)->create();

            //create 100 courses
            Course::factory(100)->create();

            $courses = Course::all();
            foreach ($courses as $course){
                $topics = Topic::all()->random(random_int(1, 5))->pluck('id')->toArray();
                $course->topics()->attach($topics);

                $authors = Author::all()->random(random_int(1, 5))->pluck('id')->toArray();
                $course->authors()->attach($authors);

                $series = Series::all()->random(random_int(1, 5))->pluck('id')->toArray();
                $course->series()->attach($series);
            }
        }


    }
}
