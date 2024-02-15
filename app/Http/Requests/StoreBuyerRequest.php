<?php

namespace App\Http\Requests;

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
            'name' => 'required|string|max:255',
            'company_name' => 'required|string',
            'email' => 'email|nullable',
            'phone' => 'nullable',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'postal_code' => 'nullable|string',
            'country' => 'nullable|string',
            'zip' => 'nullable|string',
            'nip' => function ($attribute, $value, $fail) {
                        if (!$this->checkNIP($value)) {
                            $fail('NIP nie jest poprawny');
                        }
                    },
            'regon' => function ($attribute, $value, $fail) {
                        if ($value === null || $value == '') {
                            return true;
                        }
                        $check =match (strlen($value)) {
                            9       => $this->checkREGON($value),
                            14      => $this->checkLongREGON($value),
                        };

                        if(!$check) {
                            $fail('NIP nie jest poprawny');
                        }
                    },
            'krs' => 'nullable|string',
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

    /**
     * Check if given string is valid NIP number.
     * https://github.com/pacerit/laravel-polish-validation-rules/blob/master/src/Rules/NIPRule.php
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @param null|string $string
     *
     * @return bool
     *
     * @see http://phpedia.pl/wiki/NIP Souce of this algorithm
     * @since 2019-08-12
     */
    private function checkNIP(?string $string): bool
    {
        if ($string === null || $string == '') {
            return true;
        }

        $string = preg_replace('/[^0-9]+/', '', $string);

        if (strlen($string) !== 10) {
            return false;
        }

        $arrSteps = [6, 5, 7, 2, 3, 4, 5, 6, 7];
        $intSum = 0;

        for ($i = 0; $i < 9; $i++) {
            $intSum += $arrSteps[$i] * $string[$i];
        }

        $int = $intSum % 11;
        $intControlNr = $int === 10 ? 0 : $int;

        if ($intControlNr == $string[9]) {
            return true;
        }

        return false;
    }

     /**
     * Check if given REGON number is valid - 9 digit version.
     * https://github.com/pacerit/laravel-polish-validation-rules/blob/master/src/Rules/REGONRule.php
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @param null|string $string
     *
     * @return bool
     *
     * @see http://phpedia.pl/wiki/REGON Souce of this algorithm
     * @since 2019-08-12
     */
    private function checkREGON(?string $string): bool
    {
        if ($string === null || $string == '') {
            return true;
        }

        $arrSteps = [8, 9, 2, 3, 4, 5, 6, 7];
        $intSum = 0;

        for ($i = 0; $i < 8; $i++) {
            $intSum += $arrSteps[$i] * $string[$i];
        }

        $int = $intSum % 11;
        $intControlNr = ($int == 10) ? 0 : $int;

        if ($intControlNr == $string[8]) {
            return true;
        }

        return false;
    }

    /**
     * Check if given REGON number is valid - 14 digits version.
     * https://github.com/pacerit/laravel-polish-validation-rules/blob/master/src/Rules/REGONRule.php
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @param null|string $string
     *
     * @return bool
     *
     * @see http://phpedia.pl/wiki/REGON Souce of this algorithm
     * @since 2023-05-22
     */
    private function checkLongRegon(?string $string): bool
    {
        if ($string === null || $string == '') {
            return true;
        }

        $arrSteps = [2, 4, 8, 5, 0, 9, 7, 3, 6, 1, 2, 4, 8];
        $intSum = 0;

        for ($i = 0; $i < 13; $i++) {
            $intSum += $arrSteps[$i] * $string[$i];
        }

        $int = $intSum % 11;
        $intControlNr = ($int == 10) ? 0 : $int;

        if ($intControlNr == $string[13]) {
            return true;
        }

        return false;
    }

}
