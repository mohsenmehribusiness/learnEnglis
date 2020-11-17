<?php
namespace App\Traits\Lesson;
use App\Lesson;
trait lessonQueryTrait
{
    public function newLessonQuery($filter){
        $choose=$this->choose;
        return (Lesson::findLesson($filter))->$choose();
    }

    public function oldLessonQuery($filter){
        $choose=$this->choose;
        return (Lesson::findLesson($filter))->$choose()->orderBy('id', 'asc');
    }
    public function stateCheckLessonQuery($filter){
        $choose=$this->choose;
        return (Lesson::findLesson($filter))->$choose()->StateCheck(1);
    }

    public function stateTimeLessonQuery($filter){
        $choose=$this->choose;
        return (Lesson::findLesson($filter))->$choose()->StateCheck(0);
    }
}
