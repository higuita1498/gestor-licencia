<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePartnerRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:partners,name,' . $this->partner->id,
            'identification_number' => 'required|string|max:255|unique:partners,identification_number,' . $this->partner->id,
            'partner_type_id' => 'required|integer',
            'phone_number' => 'required|integer',
            'address' => 'required|string|max:255',
        ];
    }
}
