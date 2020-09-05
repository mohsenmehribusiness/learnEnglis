<?php

namespace App\Traits;
use App\Word;
use Illuminate\Http\Request;

trait ResponseAjax
{
    public function checkstate(Request $request){

        $word=Word::find($request->id);

        $word->update([
            'state'=>!$word->state
        ]);

        return response()->json(array('state'=> $word->state), 200);
    }

    public function getInformationWord(Request $request){

        $word=Word::find($request->id);
        return response()->json(array('word'=> $word), 200);
    }
}
