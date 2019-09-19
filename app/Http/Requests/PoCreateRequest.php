<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PoCreateRequest extends FormRequest
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
            'tyumonsyo' => 'required|string',
            'deadline'=> 'date|required',
            'kumi'  => 'required',
            'syouhinn' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tyumonsyo.required'          =>     '販売会名を必ず入力してください',
            'tyumonsyo.string'            =>     '文字列で入力してください',
            'deadline.date'               =>     '2◯◯◯-◯◯-◯◯の形式で入力してください',
            'deadline.required'           =>     '期日を必ず入力して下さい',
            'kumi.required'               =>     '組を必ず選択してください',
            'syouhinn.required'           =>     '商品を必ず選択してください',
        ];
    }
}
