<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSupplieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       if($this->path()=='add_supplie' || $this->path()=='edit_supplie')
        {
          return true;
        }else
        {
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
            'syouhinn_name' => 'required | string',
            'kubunn_id' => 'required',
            'tannka' => 'required | string',
            'torihikisaki_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'syouhinn_name.required' => '商品名を入力してください',
            'syouhinn_name.string' => '文字列で入力してください',
            'kubunn_id.required' => '区分IDを選択してください',
            'tannka.required' => '単価を入力してください',
            'tannka.string' => '文字列で入力してください',
            'torihikisaki_id.required' => '取引先を選択してください'
        ];
    }
}
