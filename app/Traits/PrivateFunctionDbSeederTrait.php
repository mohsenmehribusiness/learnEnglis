<?php
namespace App\Traits;
use Faker\Generator as Faker;
use Ybazli\Faker\Facades\Faker as PFaker;
use App\Lesson;

trait PrivateFunctionDbSeederTrait
{
    private function getRandomNumber($min=50,$max=100){
        return rand($min,$max);
    }
    private function getRandomSentences(){
        $sentences=array();
        for($i=0;$i<$this->getRandomNumber(1,5);$i++)
            array_push($sentences,$this->faker->sentence);
        return $sentences;
    }
    private function getRandomArrayPersians(){
        $persians=array();
        $usage=$this->usage;
        for($i=0;$i<$this->getRandomNumber(1,5);$i++)
            array_push($persians,PFaker::$usage());
            //array_push($persians,PFaker::$usage());
        return $persians;
    }
    private function getRandomTags(){
        $tags=array();
        for($i=0;$i<$this->getRandomNumber(1,5);$i++)
            array_push($tags,$this->faker->word);
        return $tags;
    }
    private function getRandomEnglishWordOrSentence(){
        $usage=$this->usage;
        return $this->faker->$usage;
    }
    private function getRandomArrayIdLessons(){
        $randomLessons=array();
        $lessons=Lesson::select('id')->pluck('id');
        for($i=0;$i<$this->getRandomNumber(3,6);$i++)
            array_push($randomLessons,$lessons->random());
        return array_unique($randomLessons);
    }
    // String Functions ...
    private function getRandomStringSentences(){
        $sentences="";
        for($i=0;$i<$this->getRandomNumber(1,5);$i++)
            $sentences.=$this->faker->sentence."-";
        return rtrim($sentences,"-");
    }
    private function getRandomArraySentences(){
        $sentences=array();
        for($i=0;$i<$this->getRandomNumber(1,5);$i++)
            array_push($sentences,$this->faker->sentence);
        return $sentences;
    }
    private function getRandomStringPersians(){
        $persians="";
        $usage=$this->usage;
        for($i=0;$i<$this->getRandomNumber(1,5);$i++)
            $persians.=PFaker::$usage()."-";
        return rtrim($persians,"-");
    }

    private function getRandomStringTags(){
        $tags="";
        for($i=0;$i<$this->getRandomNumber(1,5);$i++)
            $tags.=$this->faker->word."-";
        return rtrim($tags,"-");
    }
}
