<?php
namespace App\Traits\Word;
use App\sentence;
use App\Word;

trait wordQueryTrait
{
    public function newWordQuery(){
        $choose=$this->choose;
        return Word::query();
    }

    public function oldWordQuery($filter){
        $choose=$this->choose;
        return Word::query();
    }

    public function stateCheckWordQuery($filter){
        $choose=$this->choose;
        return Word::StateCheck(1);
    }

    public function stateTimeWordQuery($filter){
        $choose=$this->choose;
        return Word::StateCheck(0);
    }

}
