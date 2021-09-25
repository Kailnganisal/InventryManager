<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PneumaticPartStoreRequest extends FormRequest
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
            'part'=> 'required',
            'description'=>'required',
            'tubesize'=>'required | integer',
            'warranty'=>'required',
            'quantity'=>'required | integer'
        ];
    }
}
