<?php
namespace App\Traits\Insert;
use App\Tag;
use Illuminate\Http\Request;
trait TagInsertTrait
{
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
        return redirect()->route('tag.table.index');
    }
    public function editTag($inputs)
    {
        return (Tag::find($inputs['id']))->update(['tag'=>$inputs['tag']]);
    }
    // edit tag

}
