<?php
use App\Traits\Insert\lessonInsertTrait;
use App\Traits\Insert\sentenceInsertTrait;
use App\Traits\Insert\wordInsertTrait;
use App\Traits\PrivateFunctionInsert;
use App\Traits\Qa\QaInsertTrait;
use App\Traits\Seeder\PrivateFunctionDbSeederTrait;
use App\Traits\test\functionsDatabaseSeederTrait;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    public $faker;
    use wordInsertTrait;
    use lessonInsertTrait;
    use QaInsertTrait;
    use sentenceInsertTrait;
    use functionsDatabaseSeederTrait;
    use PrivateFunctionInsert;
    use PrivateFunctionDbSeederTrait;

    public function __construct(Faker $faker)
    {
        $this->faker=$faker;
    }

    # word
    private function createInputsFakeForWord()
    {
        $inputs=[
          "word"=>$this->getRandomEnglishWordOrSentence(),
           "persian"=>$this->getRandomStringPersians(),
           "tag"=>$this->getRandomStringTags(),
           "sentence"=>$this->getRandomStringSentences(),
           "lesson"=>$this->getRandomArrayIdLessons(),
        ];
        if(rand(0,1))
            unset($inputs['tag']);
         if(rand(0,1))
            unset($inputs['lesson']);
         if(rand(0,1))
            unset($inputs['sentence']);
         return $inputs;
    }
    public function createMultiWord($min,$max)
    {
        $this->usage='word';
        for($i=0;$i<$this->getRandomNumber($min,$max);$i++)
        {
            $inputs=$this->createInputsFakeForWord();
            $this->saveWord($inputs);
        }
    }

    # lesson
    private function createInputsFakeForLesson()
    {
        $lesson=[
          'lesson'=>$this->faker->word,
          'description'=>$this->faker->sentence,
          'lesson'=>$this->faker->word,
          'tag'=>$this->getRandomStringTags()
        ];
        if(rand(0,1))
            unset($lesson['tag']);
        return $lesson;
    }
    public function createMultiLesson($min,$max)
    {
        $this->usage='word';
        for($i=0;$i<$this->getRandomNumber($min,$max);$i++)
        {
            $inputs=$this->createInputsFakeForLesson();
            $this->saveLesson($inputs);
        }
    }

    # sentence
    private function createInputsFakeForSentence()
    {
        $inputs=[
            "sentence"=>$this->getRandomEnglishWordOrSentence(),
            "persian"=>$this->getRandomStringPersians(),
            "tag"=>$this->getRandomStringTags(),
            "lesson"=>$this->getRandomArrayIdLessons(),
        ];
        if(rand(0,1))
            unset($inputs['tag']);
        if(rand(0,1))
            unset($inputs['lesson']);
        return $inputs;
    }
    public function createMultiSentence($min,$max)
    {
        $this->usage='sentence';
        for($i=0;$i<$this->getRandomNumber($min,$max);$i++)
        {
            $inputs=$this->createInputsFakeForSentence();
            $this->saveSentence($inputs);
        }
    }

    private function createInputsFakeForQa()
    {
        $inputs=[
            'title'=>$this->faker->word,
            'description'=>$this->faker->sentence,
            'tags'=>$this->getRandomStringTags(),
            'questions'=>$this->getRandomArraySentences(),
            'answers'=>$this->getRandomArraySentences(),
            'lesson'=>$this->getRandomArrayIdLessons()
            ];
        return $inputs;
    }

    public function createMultiQuestionAnswer($min,$max)
    {
        $this->usage='qa';
        for($i=0;$i<$this->getRandomNumber($min,$max);$i++)
        {
            $inputs=$this->createInputsFakeForQa();
            $this->saveQa($inputs);
        }
    }

    public function run(Faker $faker)
    {
      # factory(App\User::class, 15)->create();
      # $this->CreateMultiThings(165,170,'CreateOneSentence');
      $this->createMultiLesson(15,25);
      $this->createMultiWord(100,250);
      $this->createMultiSentence(100,250);
      $this->createMultiQuestionAnswer(40,50);
    }
}
