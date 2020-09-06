<?php

use App\Word;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Ybazli\Faker\Facades\Faker as PFaker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //$faker=new Faker();
        // $this->call(UserSeeder::class);
        for($i=0;$i<100;$i++)
        {
            $word=Word::create(
                [
                'english'=>$faker->word,
                'persian'=>[PFaker::word(),PFaker::word(),PFaker::word()],
                'sentence'=>[$faker->sentence,$faker->sentence],
                'state'=>rand(0,1),
                'lesson'=>array_rand(['1000 words','3000 words','504 words'])
                ]
            );
        }
    }
}
