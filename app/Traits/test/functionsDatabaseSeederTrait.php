<?php
namespace App\Traits\test;
use App\Lesson;
use App\sentence;
use App\Word;

trait functionsDatabaseSeederTrait
{
    public function CreateOneWord(){
        $this->usage='word';
        //save english word
        $word=Word::firstOrCreate(['word'=>$this->getRandomEnglishWordOrSentence()]);
        //save details
        $word->detail()->updateOrCreate(['usage' => $this->usage, 'state' => rand(0, 1), 'repeat' => rand(1, 12)]);
        //set persians
        $persians=$this->makeListId($this->getRandomArrayPersians(),new Persian(),'persian');
        $word->persians()->sync($persians);
        //set sentences
        if(rand(0,1))
        {
            $sentences=$this->makeListId($this->getRandomSentences(),new sentence(),'word');
            $word->sentences()->sync($sentences);
        }

        //set tags
        if(rand(0,1)){
            $tags=$this->makeListId($this->getRandomTags(),new Tag(),'tag');
            $word->tags()->sync($tags);
        }

        //save lessons
        if(rand(0,1))
            $word->lessons()->sync($this->getRandomArrayIdLessons());
    }
    public function CreateOneLesson(){
        Lesson::updateOrCreate(['lesson'=>$this->faker->word]);
    }
    public function CreateOneSentence(){
        $this->usage='sentence';
        //save english word
        $sentence=sentence::firstOrCreate(['word'=>$this->getRandomEnglishWordOrSentence()]);
        //save details
        $sentence->detail()->updateOrCreate(['usage'=>$this->usage,'state'=>rand(0,1),'repeat'=>rand(1,12)]);
        //set persian
        if(rand(0,1)){
            $persians=$this->makeListId($this->getRandomArrayPersians(),new Persian(),'persian');
            $sentence->persians()->sync($persians);
        }
        //set tags
        if(rand(0,1)){
            $tags = $this->makeListId($this->getRandomTags(), new Tag(), 'tag');
            $sentence->tags()->sync($tags);
        }
        //save lesson
        if(rand(0,1))
            $sentence->lessons()->sync($this->getRandomArrayIdLessons());
    }
    public function CreateMultiThings($min,$max,$function){
        for($i=0;$i<$this->getRandomNumber($min,$max);$i++)
            $this->$function();
    }
}
