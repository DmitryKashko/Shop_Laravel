<?php

namespace App\Http\Requests\API\Order;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\Types\Nullable;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'products' => 'required|array',
            'name' => 'required|string',
            'email' => 'required|string',
            /*'address' => 'required|string',*/
            'total_price' => 'required|integer',
        ];
    }
}
