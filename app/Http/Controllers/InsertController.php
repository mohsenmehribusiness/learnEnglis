<?php
namespace App\Http\Controllers;
use App\Traits\getDetailsTrait;
use App\Traits\Insert\lessonInsertTrait;
use App\Traits\Insert\TagInsertTrait;
use App\Traits\PrivateFunctionInsert;
use App\Traits\Insert\sentenceInsertTrait;
use App\Traits\Insert\wordInsertTrait;
use App\Traits\Qa\QaInsertTrait;
class InsertController extends Controller
{
    use getDetailsTrait;
    use PrivateFunctionInsert;
    use sentenceInsertTrait;
    use wordInsertTrait;
    use TagInsertTrait;
    use lessonInsertTrait;
    use QaInsertTrait;

    public function insert()
    {
        $details = $this->getDetails();
        return view('insert.insert', compact('details'));
    }
}
