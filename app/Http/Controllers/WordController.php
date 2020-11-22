<?php
namespace App\Http\Controllers;
use App\Traits\Cache\CacheTrait;
use App\Traits\Word\WordAjaxFunctionTrait;
use App\Traits\Word\WordOrderTrait;
use App\Word;
class WordController extends Controller
{
    use CacheTrait;
    use WordOrderTrait;
    use WordAjaxFunctionTrait;
    public function index(){
        $routes=$this->setRoutes();
        $this->setCacheQuery('newWordQuery');
        $key='word';
        $query='fake';
        return view('study.index',compact('key','query','routes'));
    }

    public function word($word){
        return Word::FindWord($word)->first();
    }
}
