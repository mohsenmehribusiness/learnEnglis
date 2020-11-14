<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Interfaces\OrderInterface;
use App\Traits\FunctionPrivateWordControllerTrait;
use App\Traits\WordOrder;
use App\Word;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class WordController extends Controller implements OrderInterface
{
    use FunctionPrivateWordControllerTrait,WordOrder;
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

    public function word($word){
        return Word::FindWord($word)->first();
    }

    //ajax
    public function checkstate(\Illuminate\Http\Request $request){
        $detail=\App\Detail::where('foreign_id',$request->id)->first();
        $detail->update([
            'state'=>!$detail->state
        ]);
        return response()->json(array('state'=> $detail->state), 200);
    }
}
