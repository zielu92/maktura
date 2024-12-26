<?php

namespace App\Http\Requests;

use App\Http\Helpers\ValidatorHelper;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingsRequest extends FormRequest
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
            'seller_company_name' => ['required', 'string', 'max:255'],
            'seller_email' => ['required', 'string', 'email', 'max:255'],
            'seller_phone' => ['required', 'string', 'max:255'],
            'seller_address' => ['required', 'string', 'max:255'],
            'seller_city' => ['required', 'string', 'max:255'],
            'seller_postal_code' => ['required', 'string', 'max:255'],
            'seller_country' => ['string'],
            'seller_nip' => ['string'],
            'seller_regon' => function ($attribute, $value, $fail) {
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
            'seller_krs' => ['string', 'nullable'],
            'invoice_default_issuer' => ['string', 'nullable'],
            'invoice_default_place' => ['string', 'nullable'],
            'invoice_default_pattern' => ['string', 'nullable'],
            'invoice_default_tax_rate' => ['string', 'nullable'],
            'invoice_default_template' => ['string', 'nullable'],
        ];
    }
}
