<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ReportStolenRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //as guest can also report
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
            "user_name" => "string|required|max:255",
            "license_plate" => "string|required|max:32",
            "color" => "required|string|max:32",
            "vin" => "required|string|max:32",
        ];
    }
}
