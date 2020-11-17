<?php
namespace App\Http\Controllers;
use App\Traits\CacheTrait;
use App\Traits\Lesson\lessonQueryTrait;
use App\Traits\Tag\tagQueryOrder;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StudyController  extends Controller{
    use CacheTrait,lessonQueryTrait,tagQueryOrder;

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

    public function AjaxQueryData(Request $request){
        $choose=rtrim($this->choose,"s");
        return Datatables::of($this->runQuery())
            ->addColumn('persian', function($word){return view('study.yajra.persianColumn',compact('word'));})
            ->addColumn('setting', function($word)use($choose){return view('study.yajra.settingColumn',compact('word','choose'));})
            ->setRowId('id')
            ->make(true);
    }
}
