<?php
namespace App\Http\Controllers;
use App\sentence;
use App\Traits\Cache\CacheTrait;
use App\Traits\Sentence\SentenceOrderTrait;
class SentenceController extends Controller
{
    use CacheTrait;
    use SentenceOrderTrait;
    public function index(){
        $routes=$this->setRoutes();
        $this->setCacheQuery('newSentenceQuery');
        $key='sentence';
        $query='fake';
        return view('study.index',compact('key','query','routes'));
    }
    public function sentence($word){
        return sentence::findSentence($word)->first();
    }
}
