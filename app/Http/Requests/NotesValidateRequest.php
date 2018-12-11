<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotesValidateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:7|max:33',
            'description' => 'required|min:10',
            'wall' => 'required|image',
            'pdf' => 'required|file',
            'price' => 'required|digits'
        ];
    }
}
