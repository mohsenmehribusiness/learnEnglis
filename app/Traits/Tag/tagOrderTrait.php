<?php
namespace App\Traits\Tag;
trait tagOrderTrait
{
    public $routes;
    public function setRoutes(){
        //$this->routes["ajax"]="tag.data.old";
        $this->routes["old"]="tag.old";
        $this->routes["new"]="tag.new";
        $this->routes["stateCheck"]="tag.state.check";
        $this->routes["stateTimes"]="tag.state.times";
        return $this->routes;
    }

    public function old($tag)
    {
        $routes=$this->setRoutes();
        $this->setCacheQuery('oldTagQuery',$tag);
        $key='tag';
        $query=$tag;
        return view('study.index',compact('key','query','routes'));
    }

    public function new($tag)
    {
        $routes=$this->setRoutes();
        $this->setCacheQuery('newTagQuery',$tag);
        $key='tag';
        $query=$tag;
        return view('study.index',compact('key','query','routes'));
    }

    public function stateCheck($tag)
    {
        $routes=$this->setRoutes();
        $this->setCacheQuery('stateCheckTagQuery',$tag);
        $key='tag';
        $query=$tag;
        return view('study.index',compact('key','query','routes'));
    }

    public function stateTimes($tag)
    {
        $routes=$this->setRoutes();
        $this->setCacheQuery('stateTimeTagQuery',$tag);
        $key='tag';
        $query=$tag;
        return view('study.index',compact('key','query','routes'));
    }

}
