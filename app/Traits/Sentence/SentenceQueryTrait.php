<?php
namespace App\Traits\Sentence;
use App\sentence;

trait SentenceQueryTrait
{
    public function newSentenceQuery(){
        $choose=$this->choose;
        return Sentence::query();
    }
    public function oldSentenceQuery($filter){
        $choose=$this->choose;
        return Sentence::query();
    }
    public function stateCheckSentenceQuery($filter){
        $choose=$this->choose;
        return Sentence::StateCheck(1);
    }
    public function stateTimeSentenceQuery($filter){
        $choose=$this->choose;
        return Sentence::StateCheck(0);
    }
}
