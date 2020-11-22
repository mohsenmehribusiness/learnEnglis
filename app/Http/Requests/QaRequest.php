<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'answers'=>'required',
            'questions'=>'required',
            'title'=>'required',
        ];
    }
}
