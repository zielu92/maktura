<x-app-layout>
    <form method="post" action="{{ route('payments.update', $method->id) }}" class="mt-6 space-y-6">
        <x-content-header route="payments.index" buttonText="Lista metod płatności">
            {{ __('Edytuj metode płatności') }}
        </x-content-header>
        @method('put')
        @csrf
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex flex-wrap -mx-3 mb-6">

                            <div class="w-full md:w-1/2 px-3 py-2">
                                <x-input-label for="name" :value="__('Nazwa')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                              :value="old('name', $method->name)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                <p class="text-xs italic">Nazwa szablonu do użytku wewnętrznego</p>
                            </div>

                            <div class="w-full md:w-1/4 px-3 py-2">
                                <x-input-label for="active" :value="__('Czy metoda płatności jest aktywna?')" />

                                <select name="active" id="active" class="mt-1 block w-full dark:bg-gray-900 sm:rounded-lg">
                                    <option value="1" @if($method->active == 1) selected="selected" @endif>Tak</option>
                                    <option value="0" @if($method->active != 1) selected="selected" @endif>Nie</option>
                                </select>

                                <x-input-error class="mt-2" :messages="$errors->get('active')" />
                            </div>
                        </div>
                        <div class="pb-7 float-right">
                            <x-primary-button>Zapisz zmiany</x-primary-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
