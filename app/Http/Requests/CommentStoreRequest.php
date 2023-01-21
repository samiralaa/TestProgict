<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentStoreRequest extends FormRequest
{
   
    public function authorize()
    {
        return True;
    }

    public function rules()
    {
        return [
            'comment' => 'required|min:20',
        ];
    }
}
