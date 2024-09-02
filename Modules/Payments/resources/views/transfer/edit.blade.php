
                        <div class="flex flex-wrap -mx-3 mb-6">

                            <div class="w-full md:w-1/2 px-3 py-2">
                                <x-input-label for="accountNumber" :value="__('Numer konta*')" />
                                <x-text-input id="accountNumber" name="paymentMedtodData[accountNumber]" type="text" class="mt-1 block w-full"
                                              :value="isset($paymentMedtodData['accountNumber']) ? $paymentMedtodData['accountNumber'] : ''" required autofocus autocomplete="accountNumber" />
                                <x-input-error class="mt-2" :messages="$errors->get('accountNumber')" />
                                <p class="text-xs italic">preferowane bez IBAN</p>
                            </div>

                            <div class="w-full md:w-1/2 px-3 py-2">
                                <x-input-label for="bankName" :value="__('Nazwa Banku*')" />
                                <x-text-input id="bankName" name="paymentMedtodData[bankName]" type="text" class="mt-1 block w-full"
                                              :value="isset($paymentMedtodData['bankName']) ? $paymentMedtodData['bankName'] : ''" required autofocus autocomplete="bankName" />
                                <x-input-error class="mt-2" :messages="$errors->get('bankName')" />
                            </div>

                            <div class="w-full md:w-1/2 px-3 py-2">
                                <x-input-label for="iban" :value="__('IBAN')" />
                                <x-text-input id="iban" name="paymentMedtodData[iban]" type="text" class="mt-1 block w-full"
                                              :value="isset($paymentMedtodData['iban']) ? $paymentMedtodData['iban'] : ''" autofocus autocomplete="iban" />
                                <x-input-error class="mt-2" :messages="$errors->get('iban')" />
                            </div>

                            <div class="w-full md:w-1/2 px-3 py-2">
                                <x-input-label for="swift" :value="__('SWIFT')" />
                                <x-text-input id="swift" name="paymentMedtodData[swift]" type="text" class="mt-1 block w-full"
                                              :value="isset($paymentMedtodData['swift']) ? $paymentMedtodData['swift'] : ''" autofocus autocomplete="swift" />
                                <x-input-error class="mt-2" :messages="$errors->get('swift')" />
                            </div>

                            <div class="w-full md:w-1/2 px-3 py-2">
                                <x-input-label for="beneficiaryName" :value="__('Nazwa odbiorcy')" />
                                <x-text-input id="beneficiaryName" name="paymentMedtodData[beneficiaryName]" type="text" class="mt-1 block w-full"
                                              :value="isset($paymentMedtodData['beneficiaryName']) ? $paymentMedtodData['beneficiaryName'] : ''" autofocus autocomplete="beneficiaryName" />
                                <x-input-error class="mt-2" :messages="$errors->get('beneficiaryName')" />
                            </div>

                            <div class="w-full md:w-1/2 px-3 py-2">
                                <x-input-label for="beneficiaryAddress" :value="__('Adres odbiorcy')" />
                                <x-text-input id="beneficiaryAddress" name="paymentMedtodData[beneficiaryAddress]" type="text" class="mt-1 block w-full"
                                              :value="isset($paymentMedtodData['beneficiaryAddress']) ? $paymentMedtodData['beneficiaryAddress'] : ''" autofocus autocomplete="beneficiaryAddress" />
                                <x-input-error class="mt-2" :messages="$errors->get('beneficiaryAddress')" />
                            </div>
                        </div>

                    </div>


