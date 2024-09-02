<x-app-layout>
    <form method="post" action="{{ route('payments.transfer.store') }}" class="mt-6 space-y-6">
        <x-content-header route="payments.index" buttonText="Lista metod płatności">
            {{ __('Dodaj informację nt. płatności przelewem') }}
        </x-content-header>
        @csrf
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex flex-wrap -mx-3 mb-6">

                            <div class="w-full md:w-1/2 px-3 py-2">
                                <x-input-label for="accountNumber" :value="__('Numer konta*')" />
                                <x-text-input id="accountNumber" name="accountNumber" type="text" class="mt-1 block w-full"
                                              :value="old('accountNumber')" required autofocus autocomplete="accountNumber" />
                                <x-input-error class="mt-2" :messages="$errors->get('accountNumber')" />
                                <p class="text-xs italic">preferowane bez IBAN</p>
                            </div>

                            <div class="w-full md:w-1/2 px-3 py-2">
                                <x-input-label for="bankName" :value="__('Nazwa Banku*')" />
                                <x-text-input id="bankName" name="bankName" type="text" class="mt-1 block w-full"
                                              :value="old('bankName')" required autofocus autocomplete="bankName" />
                                <x-input-error class="mt-2" :messages="$errors->get('bankName')" />
                            </div>

                            <div class="w-full md:w-1/2 px-3 py-2">
                                <x-input-label for="iban" :value="__('IBAN')" />
                                <x-text-input id="iban" name="iban" type="text" class="mt-1 block w-full"
                                              :value="old('iban')" autofocus autocomplete="iban" />
                                <x-input-error class="mt-2" :messages="$errors->get('iban')" />
                            </div>

                            <div class="w-full md:w-1/2 px-3 py-2">
                                <x-input-label for="swift" :value="__('SWIFT')" />
                                <x-text-input id="swift" name="swift" type="text" class="mt-1 block w-full"
                                              :value="old('swift')" autofocus autocomplete="swift" />
                                <x-input-error class="mt-2" :messages="$errors->get('swift')" />
                            </div>

                            <div class="w-full md:w-1/2 px-3 py-2">
                                <x-input-label for="beneficiaryName" :value="__('Nazwa odbiorcy')" />
                                <x-text-input id="beneficiaryName" name="beneficiaryName" type="text" class="mt-1 block w-full"
                                              :value="old('beneficiaryName')" autofocus autocomplete="beneficiaryName" />
                                <x-input-error class="mt-2" :messages="$errors->get('beneficiaryName')" />
                            </div>

                            <div class="w-full md:w-1/2 px-3 py-2">
                                <x-input-label for="beneficiaryAddress" :value="__('Adres odbiorcy')" />
                                <x-text-input id="beneficiaryAddress" name="beneficiaryAddress" type="text" class="mt-1 block w-full"
                                              :value="old('beneficiaryAddress')" autofocus autocomplete="beneficiaryAddress" />
                                <x-input-error class="mt-2" :messages="$errors->get('beneficiaryAddress')" />
                            </div>
                            <input type="hidden" value="{{$id}}" name="payment_method_id">
                        </div>
                        <div class="pb-7 float-right">
                            <x-primary-button>Skonfiguruj te metode płatności</x-primary-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
