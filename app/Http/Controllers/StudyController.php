<?php
namespace App\Http\Controllers;
use App\Detail;
use App\Http\Controllers\Interfaces\OrderInterface;
use App\Traits\StudyOrder;
use App\Word;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StudyController  extends Controller implements OrderInterface{
    use StudyOrder;
    public function index(){
        $this->setRoutes();
        $this->routes["ajax"]="study.data";
        $routes=$this->routes;
        return view('study.index',compact('routes'));
    }

    public function AjaxQueryData(Request $request){
        return Datatables::of(Word::query())
            ->addColumn('persian', function(Word $word){return view('study.yajra.persianColumn',compact('word'));})
            ->addColumn('setting', function(Word $word){return view('study.yajra.settingColumn',compact('word'));})
            ->make(true);
    }
}
