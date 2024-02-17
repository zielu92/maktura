<?php

namespace App\Http\Requests;

use App\Http\Helpers\ValidatorHelper;
use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
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
            'status'            => 'required|string|max:255',
            'type'              => 'required|string',
            'no'                => 'required|string',
            'payment_status'    => 'required|string',
            'payment_method_id' => 'required|string',
            'place'             => 'nullable|string',
            'sale_date'         => 'required|date',
            'due_date'          => 'required|date',
            'issue_date'        => 'required|date',
            'comment'           => 'nullable|string',
            'issuer_name'       => 'nullable|string',
            'issuer_name'       => 'nullable|string',
            'buyer_id'          => 'nullable|string',
            'name'              => 'required|string|max:255',
            'company_name'      => 'required|string',
            'email'             => 'email|nullable',
            'phone'             => 'nullable',
            'address'           => 'nullable|string',
            'city'              => 'nullable|string',
            'postal_code'       => 'nullable|string',
            'country'           => 'nullable|string',
            'nip'               => function ($attribute, $value, $fail) {
                                    if (!ValidatorHelper::checkNIP($value)) {
                                        $fail('NIP nie jest poprawny');
                                    }
                                },
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
            'krs'               => 'nullable|string',
        ];
    }
}
