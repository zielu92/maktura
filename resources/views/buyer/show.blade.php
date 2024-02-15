<x-app-layout>
    <form method="post" action="{{ route('buyer.store') }}" class="mt-6 space-y-6">
        <x-content-header route="buyer.index" buttonText="Lista nabywców">
            Nabywca {{ $buyer->company_name }}
        </x-content-header>
        @csrf
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 py-2">
                                <x-input-label for="name" :value="__('Nazwa szablonu')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                    :value="old('name', $buyer->name)" disabled />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                <p class="text-xs italic">Nazwa szablonu do użytku wewnętrznego</p>
                            </div>
                            <div class="w-full md:w-1/2 px-3 py-2">
                                <x-input-label for="company_name" :value="__('Nazwa podmiotu')" />
                                <x-text-input id="company_name" name="company_name" type="text"
                                    class="mt-1 block w-full" :value="old('company_name', $buyer->company_name)" disabled />
                                <x-input-error class="mt-2" :messages="$errors->get('company_name')" />
                                <p class="text-xs italic">Nazwa pojawi się na fakturze</p>
                            </div>
                            <div class="w-full md:w-1/2 px-3 py-2">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" name="email" type="text" class="mt-1 block w-full"
                                    :value="old('email', $buyer->email)" disabled />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>
                            <div class="w-full md:w-1/2 px-3 py-2">
                                <x-input-label for="phone" :value="__('Numer telefonu')" />
                                <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full"
                                    :value="old('phone', $buyer->phone)" disabled />
                                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                            </div>
                            <div class="w-full md:w-1/2 px-3 py-2">
                                <x-input-label for="address" :value="__('Adres')" />
                                <x-text-input id="address" name="address" type="text" class="mt-1 block w-full"
                                    :value="old('address', $buyer->address)" disabled />
                                <x-input-error class="mt-2" :messages="$errors->get('address')" />
                            </div>
                            <div class="w-full md:w-1/4 px-3 py-2">
                                <x-input-label for="city" :value="__('Miasto')" />
                                <x-text-input id="city" name="city" type="text" class="mt-1 block w-full"
                                    :value="old('city', $buyer->city)" disabled />
                                <x-input-error class="mt-2" :messages="$errors->get('city')" />
                            </div>
                            <div class="w-full md:w-1/4 px-3 py-2">
                                <x-input-label for="postal_code" :value="__('Kod pocztowy')" />
                                <x-text-input id="postal_code" name="postal_code" type="text"
                                    class="mt-1 block w-full" :value="old('postal_code', $buyer->postal_code)" disabled />
                                <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
                            </div>
                            <div class="w-full md:w-1/4 px-3 py-2">
                                <x-input-label for="country" :value="__('Kraj')" />
                                <x-text-input id="country" name="country" type="text" class="mt-1 block w-full"
                                    :value="old('country', $buyer->country)" disabled />
                                <x-input-error class="mt-2" :messages="$errors->get('country')" />
                            </div>
                            <div class="w-full md:w-1/4 px-3 py-2">
                                <x-input-label for="nip" :value="__('NIP')" />
                                <x-text-input id="nip" name="nip" type="text" class="mt-1 block w-full"
                                    :value="old('nip', $buyer->nip)" disabled />
                                <x-input-error class="mt-2" :messages="$errors->get('nip')" />
                            </div>
                            <div class="w-full md:w-1/4 px-3 py-2">
                                <x-input-label for="regon" :value="__('regon')" />
                                <x-text-input id="regon" name="regon" type="text" class="mt-1 block w-full"
                                    :value="old('regon', $buyer->regon)" disabled />
                                <x-input-error class="mt-2" :messages="$errors->get('regon')" />
                            </div>
                            <div class="w-full md:w-1/4 px-3 py-2">
                                <x-input-label for="krs" :value="__('krs')" />
                                <x-text-input id="krs" name="krs" type="text" class="mt-1 block w-full"
                                    :value="old('krs', $buyer->krs)" disabled />
                                <x-input-error class="mt-2" :messages="$errors->get('krs')" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
