<x-app-layout>
    <x-content-header route="invoice.create" buttonText="Stwórz fakture">
        {{ __('Faktury') }}
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
                                <th scope="col" class="px-6 py-3">Numer faktury</th>
                                <th scope="col" class="px-6 py-3">Nabywca</th>
                                <th scope="col" class="px-6 py-3">Data wystawienia</th>
                                <th scope="col" class="px-6 py-3">Suma netto</th>
                                <th scope="col" class="px-6 py-3">Suma brutto</th>
                                <th scope="col" class="px-6 py-3">Typ faktury</th>
                                <th scope="col" class="px-6 py-3"></th>
                            </tr>
                        </thead>
                            @foreach ($invoices as $invoice)
                                <tbody>

                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">

                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $invoice->id }}</td>

                                        <td class="px-6 py-4">{{ $invoice->no }}</td>

                                        <td class="px-6 py-4">
                                            {{ $invoice->buyer->name }} ({{ $invoice->buyer->company_name }})
                                        </td>

                                        <td class="px-6 py-4">{{ $invoice->issue_date }}</td>

                                        <td class="px-6 py-4">{{ $invoice->total_net }}</td>

                                        <td class="px-6 py-4">{{ $invoice->total_gross }}</td>

                                        <td class="px-6 py-4">{{ $invoice->type }}</td>

                                        <td class="px-1 py-4">
                                            <a href="{{route('invoice.show', $invoice->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline px-3">Pokaż</a>
                                            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-invoice-{{ $invoice->id }}')" type='submit' class='inline-flex items-center px-2 py-1 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'>
                                                Zaktualizuj status
                                            </button>
                                            <x-modal name="confirm-invoice-{{ $invoice->id }}" :show="$errors->invoiceDeletion->isNotEmpty()" focusable>
                                                <form method="post" action="{{ route('invoice.update', $invoice->id) }}" class="p-6" autocomplete="off" >
                                                    @csrf
                                                    @method('PATCH')

                                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                        {{ __('Na pewno chcesz zmienić status faktury id '.$invoice->id.'') }}
                                                    </h2>

                                                    <x-input-label for="status" :value="__('Status')" />

                                                    <select name="status" id="status"
                                                        class="mt-1 block w-full dark:bg-gray-900  sm:rounded-lg">
                                                        <option value="template"  {{$invoice->status=='template' ? 'selected="selected"' : '' }}>Szablon</option>
                                                        <option value="published" {{$invoice->status=='published' ? 'selected="selected"' : '' }}>Wystawiona</option>
                                                        <option value="deleted" {{$invoice->status=='deleted' ? 'selected="selected"' : '' }}>Usunięta</option>
                                                    </select>
                                                    <x-input-error class="mt-2" :messages="$errors->get('status')" />

                                                    <x-input-label for="payment_status" :value="__('Status płatności')" />
                                                    <select name="payment_status" id="payment_status"
                                                        class="mt-1 block w-full dark:bg-gray-900  sm:rounded-lg">
                                                        <option value="notpaid" {{$invoice->payment_status=='notpaid' ? 'selected="selected"' : '' }}>Oczekuje na płatność</option>
                                                        <option value="paid" {{$invoice->payment_status=='paid' ? 'selected="selected"' : '' }}>Zapłacone</option>
                                                    </select>
                                                    <x-input-error class="mt-2" :messages="$errors->get('payment_status')" />


                                                    <div class="mt-6 flex justify-end">
                                                        <x-secondary-button x-on:click="$dispatch('close')">
                                                            {{ __('Anuluj') }}
                                                        </x-secondary-button>

                                                        <x-danger-button class="ms-3">
                                                            {{ __('Zaktualizuj') }}
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

                        {{ $invoices->links('pagination::tailwind') }}

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
