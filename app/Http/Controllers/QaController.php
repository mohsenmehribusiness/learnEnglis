<?php

namespace App\Http\Controllers;
use App\Qa;
use Illuminate\Http\Request;
class QaController extends Controller
{
    public function index()
    {
        $qas=Qa::paginate(12);
        return view('qa.index',compact('qas'));
    }
    public function show(Qa $qa)
    {
        $idMax=Qa::all()->count();
        return view('qa.show',compact('qa','idMax'));
    }
    //ajax
    public function getInfo(Request $request)
    {
        $qa=Qa::find($request->id);
        $info=[
            'title'=>$qa->title,
            'id'=>$qa->id,
            'description'=>$qa->description,
            'lessons'=>$qa->lessons()->pluck('lesson'),
            'tags'=>$qa->tags()->get()->pluck('tag'),
            'answers'=>$qa->getAnswers(),
            'questions'=>$qa->getQuestions(),
        ];
        return response()->json($info,200);
    }
}
