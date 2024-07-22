<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSerialNumberEquipmentRequest extends FormRequest
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
//            'inputs.*' => 'required', // Ovo će osigurati da svi inputi u nizu "inputs" budu obavezni
        ];

        foreach ($this->request->all() as $key => $value) {
            // Ako ključ počinje sa "inputs_" i slijedi broj
            if (preg_match('/^inputs_\d+$/', $key)) {
                $rules[$key] = 'required|string'; // Postavi pravilo "required" za sve inpute
            }
        }

        return $rules;
    }
}
