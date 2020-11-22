<?php
namespace App\Traits\Lesson;

trait lessonOrderTrait
{
    public $routes;
    public function setRoutes(){
        $this->routes["old"]="lesson.old";
        $this->routes["new"]="lesson.new";
        $this->routes["stateCheck"]="lesson.state.check";
        $this->routes["stateTimes"]="lesson.state.times";
        return $this->routes;
    }
    public function old($lesson)
    {
        $routes=$this->setRoutes();
        $this->setCacheQuery('oldLessonQuery',$lesson);
        $key='lesson';
        $query=$lesson;
        return view('study.index',compact('key','query','routes'));
    }
    public function new($lesson)
    {
        $routes=$this->setRoutes();
        $this->setCacheQuery('newLessonQuery',$lesson);
        $key='lesson';
        $query=$lesson;
        return view('study.index',compact('key','query','routes'));
    }
    public function stateCheck($lesson)
    {
        $routes=$this->setRoutes();
        $this->setCacheQuery('stateCheckLessonQuery',$lesson);
        $key='lesson';
        $query=$lesson;
        return view('study.index',compact('key','query','routes'));
    }
    public function stateTimes($lesson)
    {
        $routes=$this->setRoutes();
        $this->setCacheQuery('stateTimeLessonQuery',$lesson);
        $key='lesson';
        $query=$lesson;
        return view('study.index',compact('key','query','routes'));
    }
}
