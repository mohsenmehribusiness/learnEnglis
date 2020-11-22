<?php
namespace App\Http\Controllers;
use App\sentence;
use App\Traits\CacheTrait;
use App\Traits\Sentence\SentenceOrderTrait;
use App\Traits\Word\WordOrderTrait;
use Illuminate\Http\Request;
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
