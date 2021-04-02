<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitValidationRequest extends FormRequest
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
            
                "designation"     => "required|min:5|max:255",
                "description"     => "required|min:5",
                "prix"            => "required|numeric",
                "like"            => "required|numeric",
                "pays_source"     => "required|min:3|max:255",
                "poids"           => "required|numeric",
                "image"           => "file|mimes:png,jpg,jpeg|nullable"
        ];
    }
}
