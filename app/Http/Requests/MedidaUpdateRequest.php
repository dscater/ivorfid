<?php

namespace ivorfid\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedidaUpdateRequest extends FormRequest
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
            'nom' => 'unique:medidas,nom,'.$this->medida->id,
            'simbolo' => 'unique:medidas,simbolo,'.$this->medida->id,
        ];
    }

    public function messages()
    {
        return [
            'nom.unique' => 'Esta medida ya existe.',
            'simbolo.unique' => 'Esta simbolo esta siendo utilizado.',
        ];
    }
}
