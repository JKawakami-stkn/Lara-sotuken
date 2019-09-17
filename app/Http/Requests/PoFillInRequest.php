<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PoFillInRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {  
        if($this->path() == "po_fill_in"){
            
            return true;
        }else{
            return false;
        }
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       
        return [
            "KIDS_ID" => 'required'

        ];
    }

    public function messages()
    {
        return[
            "KIDS_ID.required" => "園児の名前を選択してください"
        ];
    }
}
