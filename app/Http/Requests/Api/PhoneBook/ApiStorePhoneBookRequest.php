<?php

namespace App\Http\Requests\Api\PhoneBook;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ApiStorePhoneBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'DDD'   => ['required', 'integer', 'digits: 2'],
            'name'  => ['required', 'string', 'max:255'],
            'city'  => ['required', 'string', 'max:255'],
        ];
    }

    public function failedValidation(Validator $validator) : HttpResponseException
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Erro de validação',
            'errors'  => $validator->errors(),
        ]));
    }

}
