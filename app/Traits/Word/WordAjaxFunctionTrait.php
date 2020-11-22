<?php
namespace App\Traits\Word;
use App\sentence;
use App\Word;
use Illuminate\Http\Request;
trait WordAjaxFunctionTrait
{
    //ajax
    public function changeStateWithAjax(Request $request){
        $detail=\App\Detail::where('foreign_id',$request->id)->first();
        $detail->update([
            'state'=>!$detail->state
        ]);
        return response()->json(array('state'=> $detail->state), 200);
    }
    public function getInformationWord(Request $request)
    {
        if($word=Word::find($request->id)){
            $lists=[
                'english'=>$word->word,
                'persians'=>$word->persians()->pluck('persian'),
                'sentences'=>$word->sentences()->pluck('word')
            ];
        }
        elseif($word=sentence::find($request->id)){
            $lists=[
                'english'=>$word->word,
                'persians'=>$word->persians()->pluck('persian'),
                'sentences'=>null
            ];
        }

        return response()->json($lists, 200);
    }

}
