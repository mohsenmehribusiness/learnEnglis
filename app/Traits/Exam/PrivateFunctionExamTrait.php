<?php
namespace App\Traits\Exam;
use App\sentence;
use App\Word;

trait PrivateFunctionExamTrait
{
    private function CreateQuestionList($lists){

    }

    private function checkOption($option,$number){
        switch ($option) {
            case 'wordAll':
                $list=Word::all();
                $questions=$this->CreateQuestionList($list);
                 return $list;
                 break;
            case 'wordCheck':
                $list=Word::StateCheck(1)->get()->random($number);
                $questions=$this->CreateQuestionList($list);
                 return $list;
                break;
            case 'wordTimes':
                $list=Word::StateCheck(0)->get()->random($number);
                $questions=$this->CreateQuestionList($list);
                 return $list;
                break;
            case 'sentenceAll':
                $list=Sentence::select('sentence as word','id')->get()->random($number);
                $questions=$this->CreateQuestionList($list);
                 return $list;
                break;
            case 'sentenceCheck':
                $list=sentence::StateCheck(1)->select('sentence as word','id')->get()->random($number);
                $questions=$this->CreateQuestionList($list);
                 return $list;
                break;
            case 'sentenceTimes':
                $list=sentence::StateCheck(0)->select('sentence as word','id')->get()->random($number);
                $questions=$this->CreateQuestionList($list);
                 return $list;
                break;
                case 'sentenceUsage':
                $list=sentence::Usage('sentence')->select('sentence as word','id')->get()->random($number);
                $questions=$this->CreateQuestionList($list);
                 return $list;
                break;
            default:
                dd('default');
        }
    }

    private function getListQuestionsWords($words,$number){
        $list=null;
        for($i=1;$i<$number;$i++){
            $list=array_push($list,$this->createOneQuestion($option));
        }
    }
    private function getListQuestionsSentence($sentences,$number){
        $list=null;
        for($i=1;$i<$number;$i++){
            $list=array_push($list,$this->createOneQuestion($option));
        }
    }

}
