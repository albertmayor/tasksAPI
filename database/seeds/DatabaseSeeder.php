<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Task;
use App\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $faker = Faker\Factory::create();
        $this->seedTasks($faker);
        $this->seedTags($faker);

        Model::reguard();
    }

    public function seedTasks($faker)
    {
        foreach (range(0,100) as $number){
            $task = new Task();

            $task->name = $faker->sentence;
            $task->done = $faker->boolean;
            $task->priority = $faker->randomDigit;

            $task-> save();
        }
    }

    public function seedTags($faker)
    {
        foreach (range(0,100) as $number){
            $tag = new Tag();

            $tag->name = $faker->word;
            $tag->random_bool = $faker->boolean;
            $tag-> save();
        }
    }
}
