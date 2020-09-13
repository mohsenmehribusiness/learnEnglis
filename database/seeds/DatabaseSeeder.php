<?php

use App\Lesson;
use App\sentence;
use App\Traits\PrivateFunctionInsert;
use App\Traits\PrivateFunctionDbSeederTrait;
use App\Word;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Ybazli\Faker\Facades\Faker as PFaker;

class DatabaseSeeder extends Seeder
{
    public $faker;
    use PrivateFunctionInsert,PrivateFunctionDbSeederTrait;

    public function __construct(Faker $faker)
    {
        $this->faker=$faker;
    }

    private function CreateOneWord(){
        $this->usage='word';
        //save english word
        $word=Word::create(['english'=>$this->getRandomEnglishWordOrSentence()]);
        //save details
        $word->Detail()->create(['usage'=>$this->usage]);
        //save relations one many [persians , tags , sentences]
        //set persians
        $persians=$this->getRandomArrayPersians();
        $this->SaveOneToMany($word,$persians,'Persians','persian');
        //set tags
        if(rand(0,1))
            $this->SaveOneToMany($word,$this->getRandomTags(),'Tags','tag');
        //set senternces
        if(rand(0,1))
            $this->SaveOneToMany($word, $this->getRandomSentences(), 'Sentences', 'sentence');
        //save lessons
        if(rand(0,1))
            $word->Lessons()->sync($this->getRandomArrayIdLessons());
    }

    private function CreateOneLesson(){
        Lesson::create(['lesson'=>$this->faker->word,'description'=>$this->faker->sentence]);
    }

    private function CreateOneSentence(){
        $this->usage='sentence';
        //save english word
        $sentence=sentence::create(['sentence'=>$this->getRandomEnglishWordOrSentence(),'usage'=>$this->usage]);
        //save details
        $sentence->Detail()->create(['usage'=>$this->usage]);
        //save persian
        $this->SaveOneToMany($sentence,$this->getRandomArrayPersians(),'Persians','persian');
        //save tag
        if(rand(0,1))
            $this->SaveOneToMany($sentence,$this->getRandomTags(),'Tags','tag');
        //save lesson
        if(rand(0,1))
            $sentence->Lessons()->sync($this->getRandomArrayIdLessons());
    }

    private function CreateMultiThings($min,$max,$function){
        for($i=0;$i<$this->getRandomNumber($min,$max);$i++)
            $this->$function();
    }

    public function run(Faker $faker)
    {
      $this->CreateMultiThings(15,35,'CreateOneLesson');
      $this->CreateMultiThings(65,90,'CreateOneWord');
      $this->CreateMultiThings(65,70,'CreateOneSentence');
    }
}
