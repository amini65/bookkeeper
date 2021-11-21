<?php

namespace App\Http\Requests\Transaction;

use Illuminate\Foundation\Http\FormRequest;

class SaleStoreRequest extends FormRequest
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
            'user_id' => ['required', 'exists:users,id'],
            'product_id' => [ 'required', 'exists:products,id'],
            'weight' => ['required', 'numeric'],
            'amount' => ['required', 'numeric'],
            'date' => ['required']
        ];
    }
}
