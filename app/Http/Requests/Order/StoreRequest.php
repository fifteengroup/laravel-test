<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array
     */
    public function rules()
    {
        return [
            'unique_number' => 'required|unique:orders',
            'contact_id' => 'required',
            'product_name.*' => 'required',
            'price.*' => 'numeric'
        ];
    }

     public function messages()
    {
        return [
            'unique_number.required' => 'Order number field is required and must be unique!',
            'contact_id.required' => 'Contact field is required!',
            'product_name.required' => 'Item/Product name is required!',
            'price.required' => 'Product price is required!',
        ];
    }
}
