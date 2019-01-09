<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//modifica este valor a true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|max:25',
            'short'=>'required',
            'body'=>'required'
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'Debe completar el titulo',
            'body.required'  => 'El cuerpo del mensaje esta vacio',
        ];
    }

}
