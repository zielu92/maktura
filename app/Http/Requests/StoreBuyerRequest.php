<?php

namespace App\Http\Requests;

use App\Http\Helpers\ValidatorHelper;
use Illuminate\Foundation\Http\FormRequest;

class StoreBuyerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'              => 'required|string|max:255',
            'company_name'      => 'required|string',
            'email'             => 'email|nullable',
            'phone'             => 'nullable',
            'address'           => 'nullable|string',
            'city'              => 'nullable|string',
            'postal_code'       => 'nullable|string',
            'country'           => 'nullable|string',
            'nip'               => 'nullable',
            'regon'             => function ($attribute, $value, $fail) {
                                            if ($value === null || $value == '') {
                                                return true;
                                            }
                                            $check =match (strlen($value)) {
                                                9       => ValidatorHelper::checkREGON($value),
                                                14      => ValidatorHelper::checkLongREGON($value),
                                            };

                                            if(!$check) {
                                                $fail('NIP nie jest poprawny');
                                            }
                                        },
            'krs'               => 'nullable|string'
        ];
    }

     /**
     * Custom message validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'             => 'Nazwa szablonu jest wymagana!',
            'company_name.required'     => 'Nazwa firmy jest wymagana!',
            'email.email'               => 'Podaj poprawny email',
            'name.max'                  => 'Podaj krótszą nazwę',
        ];
    }

}
