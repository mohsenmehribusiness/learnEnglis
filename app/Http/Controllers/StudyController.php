<?php
namespace App\Http\Controllers;
use App\Traits\Cache\CacheTrait;
use App\Traits\Lesson\lessonQueryTrait;
use App\Traits\Sentence\SentenceQueryTrait;
use App\Traits\Study\AjaxQueryDataTrait;
use App\Traits\Tag\tagQueryTrait;
use App\Traits\Word\wordQueryTrait;
class StudyController  extends Controller{
    use CacheTrait;
    use lessonQueryTrait;
    use tagQueryTrait;
    use wordQueryTrait;
    use SentenceQueryTrait;
    use AjaxQueryDataTrait;
    public function __construct()
    {
        $this->choose=$this->getChooseInCache();
    }

    public function index(){
        $this->setRoutes();
        $this->routes["ajax"]="study.data";
        $routes=$this->routes;
        return view('study.index',compact('routes'));
    }
}
