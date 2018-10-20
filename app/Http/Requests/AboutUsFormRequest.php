<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutUsFormRequest extends FormRequest
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
            'title'=>'required',
            'slug'=>'required',
            'content'=>'required',
            'awards'=>'required|min:1|numeric',
            'happy_clients'=>'required|min:1|numeric',
            'winning_awards'=>'required|min:1|numeric',
            'line_of_code'=>'required|min:1|numeric',
        ];
    }
}
