<?php
namespace App\Http\Controllers;
use App\Detail;
use App\Http\Controllers\Interfaces\OrderInterface;
use App\Traits\Study;
use App\Word;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StudyController  extends Controller implements OrderInterface{
    use Study;
    public function index(){
        $route="study.data";
        $old="study.old";
        return view('study.index',compact('route','old'));
    }

    public function AjaxQueryData(Request $request){
        return Datatables::of(Word::orderBy('id', 'DESC'))
        ->addColumn('persian', function(Word $word){return view('study.yajra.persianColumn',compact('word'));})
        ->addColumn('setting', function(Word $word){return view('study.yajra.settingColumn',compact('word'));})
        ->make(true);
    }
}
