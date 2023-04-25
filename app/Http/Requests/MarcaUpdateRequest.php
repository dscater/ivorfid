<?php

namespace ivorfid\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarcaUpdateRequest extends FormRequest
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
            'nom' => 'unique:marcas,nom,'.$this->marca->id,
        ];
    }

    public function messages()
    {
        return [
            'nom.unique' => 'Esta marca de producto ya existe.',
        ];
    }
}
