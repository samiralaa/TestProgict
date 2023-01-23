<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => Auth::id(),
       ]);
    }
    public function rules()
    {
        return [
            'title'   => 'required|unique:posts,title',$this->id,
            'content' => 'required|min:20',
            'author'  => 'nullable',
            'user_id' => 'nullable',
            'image'   => 'required|image|mimes:png,jpg,webp|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'content is Must',
            'content.min'      => 'content Must be 20 Chr.',
        ];
    }
}
