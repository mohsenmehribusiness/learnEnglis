<?php
namespace App\Http\Controllers;
use App\Traits\Exam\PrivateFunctionExamTrait;
use Illuminate\Http\Request;
class ExamController extends Controller
{
    use PrivateFunctionExamTrait;
    public function index(){
        return view('exam.index');
    }
    public function ChooseOptional($option,$number){
        $lists=$this->checkOption($option,$number);
        return  $lists;
        return view('exam.exam',compact('lists'));
    }
    public function special(Request $request){
        return $request->all();
        //test
        return array_rand([1,2,3,4,5]);
        //test
        $lists=null;
        return view('exam.exam',compact('lists'));
    }
}
