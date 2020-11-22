<?php
namespace App\Traits\Sentence;

trait SentenceOrderTrait
{
    public $routes;
    public function setRoutes(){
        $this->routes["old"]="sentence.old";
        $this->routes["new"]="sentence.new";
        $this->routes["stateCheck"]="sentence.state.check";
        $this->routes["stateTimes"]="sentence.state.times";
        return $this->routes;
    }

    public function old($sentence)
    {
        $routes=$this->setRoutes();
        $this->setCacheQuery('oldSentenceQuery',$sentence);
        $key='sentence';
        $query=$sentence;
        return view('study.index',compact('key','query','routes'));
    }

    public function new($sentence)
    {
        $routes=$this->setRoutes();
        $this->setCacheQuery('newSentenceQuery',$sentence);
        $key='sentence';
        $query=$sentence;
        return view('study.index',compact('key','query','routes'));
    }
    public function stateCheck($sentence)
    {
        $routes=$this->setRoutes();
        $this->setCacheQuery('stateCheckSentenceQuery',$sentence);
        $key='sentence';
        $query=$sentence;
        return view('study.index',compact('key','query','routes'));
    }
    public function stateTimes($sentence)
    {
        $routes=$this->setRoutes();
        $this->setCacheQuery('stateTimeSentenceQuery',$sentence);
        $key='sentence';
        $query=$sentence;
        return view('study.index',compact('key','query','routes'));
    }

}
