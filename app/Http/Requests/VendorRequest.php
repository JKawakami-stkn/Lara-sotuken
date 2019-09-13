<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {   

        if($this->path() == 'add_vendor' || $this->path() == 'edit_vendor'){
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
            'torihikisaki_name'=> 'required|string',
            'zyuusyo'=> 'required|string',
            'denwabanngou'=> 'required|alpha_num',
        ];
    }

    public function messages(){
        return [
            'torihikisaki_name.required'=> '取引先名を入力してください',
            'zyuusyo.required'=> '住所を入力してください',
            'denwabanngou.required'=> '電話番号を入力してください',
            'denwabanngou.alpha_num'=> '入力できるのは整数値のみです',
        ];
    }
}
