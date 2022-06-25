<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLicenceRequest extends FormRequest
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
            'licencesNumber' => 'required|integer|min:1',
            'partner_id' => 'required|exists:partners,id',
            'product_id' => 'required|exists:products,id',
        ];
    }
}
