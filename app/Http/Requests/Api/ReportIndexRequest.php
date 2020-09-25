<?php

namespace App\Http\Requests\Api;

use App\Models\StolenCar;
use Illuminate\Foundation\Http\FormRequest;

class ReportIndexRequest extends FormRequest
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
        $filters = ['make', 'model', 'year'];
        $orderBy = implode(',', $filters);

        return [
            'per_page' => 'sometimes|integer|min:1',
            'page' => 'sometimes|integer|min:1',
            'order_by' => 'sometimes|string|in:' . $orderBy,
            'direction' => 'required_with:order_by|string|in:asc,desc',
            'search' => 'sometimes|string',
        ];
    }
}
