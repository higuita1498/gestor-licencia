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
            'PartnerName' => 'required|string|max:255|unique:partners,PartnerName,' . $this->partner->id,
            'PartnerID' => 'required|string|max:255|unique:partners,PartnerID,' . $this->partner->id,
            'PartnerEmail' => 'required|string|max:255|unique:partners,PartnerEmail,' . $this->partner->id,
            'PartnerContactNumber' => 'required|integer|unique:partners,PartnerContactNumber,' . $this->partner->id,
            'PartnerContactName' => 'required|string|max:255',
        ];
    }
}
