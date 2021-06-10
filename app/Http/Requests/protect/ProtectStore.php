<?php

namespace App\Http\Requests\protect;

use Illuminate\Foundation\Http\FormRequest;

class ProtectStore extends FormRequest
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
            'name'=>['require','string','max:255'],
            'category_id'=>['require','string'],
            'content'=>['string'],
            'banner'=>['require','img'],

        ];
    }
}
