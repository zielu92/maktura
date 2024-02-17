<x-app-layout>
    <x-content-header route="buyer.create" buttonText="Dodaj nabywce">
        {{ __('Nabywcy') }}
    </x-content-header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">ID</th>
                                <th scope="col" class="px-6 py-3">Nazwa</th>
                                <th scope="col" class="px-6 py-3">Nazwa firmy</th>
                                <th scope="col" class="px-6 py-3"></th>
                            </tr>
                        </thead>
                            @foreach ($buyers as $buyer)
                                <tbody>

                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">

                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $buyer->id }}</td>

                                        <td class="px-6 py-4">{{ $buyer->name }}</td>

                                        <td class="px-6 py-4">{{ $buyer->company_name }}</td>

                                        <td class="px-1 py-4">
                                            <a href="{{route('buyer.show', $buyer->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline px-3">Pokaż</a>
                                            <a href="{{route('buyer.edit', $buyer->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline px-3">Edytuj</a>

                                            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-buyer-deletion')" type='submit' class='inline-flex items-center px-2 py-1 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'>
                                                Usuń
                                            </button>
                                            <x-modal name="confirm-buyer-deletion" :show="$errors->buyerDeletion->isNotEmpty()" focusable>
                                                <form method="post" action="{{ route('buyer.destroy', $buyer->id) }}" class="p-6">
                                                    @csrf
                                                    @method('DELETE')

                                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                        {{ __('Na pewno chcesz usunąć '.$buyer->company_name.' z bazy danych?') }}
                                                    </h2>

                                                    <div class="mt-6 flex justify-end">
                                                        <x-secondary-button x-on:click="$dispatch('close')">
                                                            {{ __('Anuluj') }}
                                                        </x-secondary-button>

                                                        <x-danger-button class="ms-3">
                                                            {{ __('Usiń') }}
                                                        </x-danger-button>
                                                    </div>
                                                </form>
                                            </x-modal>

                                        </td>
                                    </tr>

                                </tbody>
                            @endforeach
                        </table>
                    </div>
                    <div class="py-12">

                        {{ $buyers->links('pagination::tailwind') }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

