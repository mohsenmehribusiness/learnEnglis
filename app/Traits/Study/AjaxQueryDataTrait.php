<?php
namespace App\Traits\Study;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
trait AjaxQueryDataTrait
{
    public function AjaxQueryData(Request $request){
        $choose=rtrim($this->choose,"s");
        return Datatables::of($this->runQuery())
            ->addColumn('persian', function($word){return view('study.yajra.persianColumn',compact('word'));})
            ->addColumn('setting', function($word)use($choose){return view('study.yajra.settingColumn',compact('word','choose'));})
            ->setRowId('id')
            ->make(true);
    }
}
