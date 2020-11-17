<?php
namespace App\Http\Controllers;
use App\Traits\Insert\lessonInsertTrait;
use App\Traits\PrivateFunctionInsert;
use App\Traits\Insert\sentenceInsertTrait;
use App\Traits\Insert\wordInsertTrait;
use App\Word;
use Illuminate\Http\Request;

class InsertController extends Controller
{
    use PrivateFunctionInsert;
    use sentenceInsertTrait;
    use wordInsertTrait;
    use lessonInsertTrait;
    public function insert()
    {
        $details = $this->getDetails();
        return view('insert.insert', compact('details'));
    }

    public function editWordGet(Word $word)
    {
        return view('insert.edit.word',compact('word'));
    }
    public function editWordPost(Request $request)
    {
        return $request->all();
    }
}
