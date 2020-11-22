<?php
namespace App\Traits\Tag;
use App\Tag;

trait tagQueryTrait
{
    public function newTagQuery($filter){
        $choose=$this->choose;
        return (Tag::findTag($filter))->$choose();
    }

    public function oldTagQuery($filter){
        $choose=$this->choose;
        return (Tag::findTag($filter))->$choose()->orderBy('id', 'asc');
    }

    public function stateCheckTagQuery($filter){
        $choose=$this->choose;
        return (Tag::findTag($filter))->$choose()->StateCheck(1);
    }

    public function stateTimeTagQuery($filter){
        $choose=$this->choose;
        return (Tag::findTag($filter))->$choose()->StateCheck(0);
    }
}
