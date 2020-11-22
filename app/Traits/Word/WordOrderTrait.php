<?php
namespace App\Traits\Word;

trait WordOrderTrait
{
    public $routes;
    public function setRoutes(){
        $this->routes["old"]="word.old";
        $this->routes["new"]="word.new";
        $this->routes["stateCheck"]="word.state.check";
        $this->routes["stateTimes"]="word.state.times";
        return $this->routes;
    }
    public function old($word)
    {
        $routes=$this->setRoutes();
        $this->setCacheQuery('oldWordQuery',$word);
        $key='word';
        $query=$word;
        return view('study.index',compact('key','query','routes'));
    }
    public function new($word)
    {
        $routes=$this->setRoutes();
        $this->setCacheQuery('newWordQuery',$word);
        $key='word';
        $query=$word;
        return view('study.index',compact('key','query','routes'));
    }
    public function stateCheck($word)
    {
        $routes=$this->setRoutes();
        $this->setCacheQuery('stateCheckWordQuery',$word);
        $key='word';
        $query=$word;
        return view('study.index',compact('key','query','routes'));
    }
    public function stateTimes($word)
    {
        $routes=$this->setRoutes();
        $this->setCacheQuery('stateTimeWordQuery',$word);
        $key='word';
        $query=$word;
        return view('study.index',compact('key','query','routes'));
    }

}
