<?php
namespace App\Http\Controllers;
use App\Tag;
use App\Traits\Insert\lessonInsertTrait;
use App\Traits\PrivateFunctionInsert;
use App\Traits\Insert\sentenceInsertTrait;
use App\Traits\Insert\wordInsertTrait;
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

    // edit tag
    public function editTagGet(Tag $tag)
    {
        return view('insert.edit.tag',compact('tag'));
    }
    public function editTagPost(Request $request)
    {
        $inputs=$this->makeInputs($request);
        $this->editTag($inputs);
        alert('edit tag done','done');
        return redirect()->route('home');
    }
    public function editTag($inputs)
    {
        return (Tag::find($inputs['id']))->update(['tag'=>$inputs['tag']]);
    }
    // edit tag

}
