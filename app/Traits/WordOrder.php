<?php


namespace App\Traits;


use App\Word;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

trait WordOrder

{
    public  $routes;

    public function setRoutes(){
        $this->routes["ajax"]="word.data.old";
        $this->routes["old"]="word.old";
        $this->routes["new"]="word.new";
        $this->routes["stateCheck"]="word.state.check";
        $this->routes["stateTimes"]="word.state.times";
    }
    /**
     * @inheritDoc
     */
    public function old()
    {
        $this->setRoutes();
        $this->routes["ajax"]="word.data.old";
        $routes=$this->routes;
        return view('study.index',compact('routes'));
    }

    public function AjaxQueryDataOld(Request $request){
        return Datatables::of(Word::orderBy('id', 'DESC'))
            ->addColumn('persian', function(Word $word){return view('study.yajra.persianColumn',compact('word'));})
            ->addColumn('setting', function(Word $word){return view('study.yajra.settingColumn',compact('word'));})
            ->make(true);
    }

    /**
     * @inheritDoc
     */
    public function new()
    {
        $this->setRoutes();
        $this->routes["ajax"]="word.data.new";
        $routes=$this->routes;
        return view('study.index',compact('routes'));
    }

    /**
     * @inheritDoc
     */
    public function AjaxQueryDataNew(\Illuminate\Http\Request $request)
    {
        return Datatables::of(Word::orderBy('id', 'ASC'))
            ->addColumn('persian', function(Word $word){return view('study.yajra.persianColumn',compact('word'));})
            ->addColumn('setting', function(Word $word){return view('study.yajra.settingColumn',compact('word'));})
            ->make(true);
    }

    /**
     * @inheritDoc
     */
    public function StateCheck()
    {
        $this->setRoutes();
        $this->routes["ajax"]="word.data.state.check";
        $routes=$this->routes;
        return view('study.index',compact('routes'));
    }

    /**
     * @inheritDoc
     */
    public function AjaxQueryDataStateCheck(\Illuminate\Http\Request $request)
    {
        return Datatables::of(Word::StateCheck('1'))
            ->addColumn('persian', function(Word $word){return view('study.yajra.persianColumn',compact('word'));})
            ->addColumn('setting', function(Word $word){return view('study.yajra.settingColumn',compact('word'));})
            ->make(true);
    }

    /**
     * @inheritDoc
     */
    public function StateTimes()
    {
        $this->setRoutes();
        $this->routes["ajax"]="word.data.state.times";
        $routes=$this->routes;
        return view('study.index',compact('routes'));
    }

    /**
     * @inheritDoc
     */
    public function AjaxQueryDataStateTimes(\Illuminate\Http\Request $request)
    {
        return Datatables::of(Word::StateCheck('0'))
            ->addColumn('persian', function(Word $word){return view('study.yajra.persianColumn',compact('word'));})
            ->addColumn('setting', function(Word $word){return view('study.yajra.settingColumn',compact('word'));})
            ->make(true);
    }

}
