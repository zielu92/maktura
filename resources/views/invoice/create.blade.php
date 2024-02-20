<x-app-layout>
    <form method="post" action="{{ route('invoice.store') }}" class="mt-6 space-y-6">
        <x-content-header route="invoice.index" buttonText="Lista faktur">
            {{ __('Generuj nową fakturę') }}
        </x-content-header>
        @csrf
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex flex-wrap -mx-3 mb-6" x-data="{ buyer_id: '{{ old('buyer_id') ?? '-1' }}' }">

                            <div class="w-full md:w-1/4 px-3 py-2">
                                <x-input-label for="status" :value="__('Status')" />
                                <select name="status" id="type"
                                    class="mt-1 block w-full dark:bg-gray-900  sm:rounded-lg">
                                    <option value="template" selected='selected'>Szablon</option>
                                    <option value="published">Wystawiona</option>
                                    <option value="deleted">Usunięta</option>
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('status')" />
                            </div>


                            <div class="w-full md:w-1/4 px-3 py-2">
                                <x-input-label for="type" :value="__('Typ faktury')" />
                                <select name="type" id="type"
                                    class="mt-1 block w-full dark:bg-gray-900  sm:rounded-lg">
                                    <option value="regular" selected='selected'>Końcowa</option>
                                    <option value="proforma">Proforma</option>
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('type')" />
                            </div>

                            <div class="w-full md:w-1/4 px-3 py-2">
                                <x-input-label for="no" :value="__('Numer faktury')" />
                                <x-text-input id="no" name="no" type="text" class="mt-1 block w-full"
                                    :value="old('no')" required autofocus autocomplete="no"
                                    value="/{{ date('Y') }}" />
                                //TODO: auto numerating - set up option format in settings
                                <x-input-error class="mt-2" :messages="$errors->get('no')" />
                            </div>

                            <div class="w-full md:w-1/4 px-3 py-2">
                                <x-input-label for="payment_status" :value="__('Status płatności')" />
                                <select name="payment_status" id="payment_status"
                                    class="mt-1 block w-full dark:bg-gray-900  sm:rounded-lg">
                                    <option value="notpaid" selected='selected'>Oczekuje na płatność</option>
                                    <option value="paid">Zapłacone</option>
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('payment_status')" />
                            </div>

                            <div class="w-full md:w-1/6 px-3 py-2">
                                <x-input-label for="payment_method_id" :value="__('Metoda Płatności')" />
                                <select name="payment_method_id" id="payment_method_id"
                                    class="mt-1 block w-full dark:bg-gray-900  sm:rounded-lg">
                                    <option value="0" selected='selected'>Gotówka</option>
                                    <option value="1">Transfer</option>
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('payment_method_id')" />
                            </div>

                            <div class="w-full md:w-1/3 px-3 py-2">
                                <x-input-label for="place" :value="__('Miejsce wystawienia')" />
                                <x-text-input id="place" name="place" type="text" class="mt-1 block w-full"
                                    :value="old('place')" autofocus autocomplete="place" />
                                <x-input-error class="mt-2" :messages="$errors->get('place')" />
                                //TODO: set up option format in settings
                            </div>
                            <div class="w-full md:w-1/6 px-3 py-2">
                                <x-input-label for="sale_date" :value="__('Data wystaiwenia faktury')" />
                                <x-text-input id="sale_date" name="sale_date" type="date" class="mt-1 block w-full"
                                    :value="old('sale_date')" required autofocus autocomplete="sale_date" />
                                <x-input-error class="mt-2" :messages="$errors->get('sale_date')" />
                            </div>
                            <div class="w-full md:w-1/6 px-3 py-2">
                                <x-input-label for="issue_date" :value="__('Data sprzedaży')" />
                                <x-text-input id="issue_date" name="issue_date" type="date" class="mt-1 block w-full"
                                    :value="old('issue_date')" required autofocus autocomplete="issue_date" />
                                <x-input-error class="mt-2" :messages="$errors->get('issue_date')" />
                            </div>
                            <div class="w-full md:w-1/6 px-3 py-2">
                                <x-input-label for="due_date" :value="__('Data płatności do')" />
                                <x-text-input id="due_date" name="due_date" type="date" class="mt-1 block w-full"
                                    :value="old('due_date')" required autofocus autocomplete="due_date" />
                                <x-input-error class="mt-2" :messages="$errors->get('due_date')" />
                            </div>
                            <div class="w-full md:w-1/2 px-3 py-2">
                                <x-input-label for="comment" :value="__('Komentarz')" />
                                <x-text-input id="comment" name="comment" type="text" class="mt-1 block w-full"
                                    :value="old('comment')" required autofocus autocomplete="comment" />
                                <x-input-error class="mt-2" :messages="$errors->get('comment')" />
                                <p class="text-xs italic">np. "odwrotne obciążenie / reverse charge"</p>
                            </div>
                            <div class="w-full md:w-1/4 px-3 py-2">
                                <x-input-label for="issuer_name" :value="__('Wysawiający fakturę')" />
                                <x-text-input id="issuer_name" name="issuer_name" type="text"
                                    class="mt-1 block w-full" :value="old('issuer_name')" required autofocus
                                    autocomplete="issuer_name" />
                                <x-input-error class="mt-2" :messages="$errors->get('issuer_name')" />
                                <p class="text-xs italic">Imię nazwisko wystawiającego fakturę</p>
                                //TODO: setting for default
                            </div>

                            <div class="w-full md:w-1/4 px-3 py-2">

                                <x-input-label for="buyer_id" :value="__('Nabywca')" />
                                <select x-model="buyer_id" name="buyer_id" id="buyer_id"
                                    class="mt-1 block w-full dark:bg-gray-900  sm:rounded-lg">
                                    <option value="-1">Dodaj nowego</option>
                                    @foreach ($buyers as $buyer)
                                        <option value="{{ $buyer->id }}">
                                            {{ $buyer->name }}({{ $buyer->company_name }})</option>
                                    @endforeach
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('buyer_id')" />
                            </div>

                            <template x-if="buyer_id == '-1'">
                                <div class="flex flex-wrap -mx-3 mb-6 dark:bg-gray-600 sm:rounded-lg">
                                    <h2 class="w-full px-3 py-2">Dodaj nowego nabywce</h2>
                                    <x-forms.new-buyer></x-forms.new-buyer>
                                </div>
                            </template>
                        </div>

                        <div x-data="invoiceItems()" class="w-full px-1 py-2">

                            <template x-for="(item, index) in items" :key="item.id">
                                <div class="flex flex-wrap -mx-3 mb-6 dark:bg-gray-700 sm:rounded-lg px-3 py-2">
                                    <div class="md:w-1/5">
                                        <x-input-label for="item[`${divClass}`][name]" :value="__('Nazwa przedmiotu/usługi')" />
                                        <textarea rows="4" name="item[][name]" x-bind:name="`item[${item.id}][name]`" x-model="item.name"
                                            class="mt-1 block w-full dark:bg-gray-900 sm:rounded-lg" required autofocus resize-none>{{ old('item[][name]') }}</textarea>
                                        <x-input-error class="mt-2" :messages="$errors->get('item[][name]')" />
                                    </div>
                                    <div class="flex flex-wrap md:w-4/5">
                                        <div class="w-full md:w-1/6 px-6">
                                            <x-input-label for="item[][quantity]" :value="__('Ilość')" />
                                            <x-text-input id="item[][quantity]"
                                                x-bind:name="`item[${item.id}][quantity]`" type="number"
                                                min="1" x-model="item.quantity" class="mt-1 block w-full"
                                                required autocomplete="item[][quantity]"
                                                x-on:change.debounce="calculateItem(item)" />
                                            <x-input-error class="mt-2" :messages="$errors->get('item[][quantity]')" />
                                        </div>
                                        <div class="w-full md:w-1/4 px-6">
                                            <x-input-label for="item[][price_net]" :value="__('Cena netto')" />
                                            <x-text-input id="item[][price_net]"
                                                x-bind:name="`item[${item.id}][price_net]`" type="number"
                                                x-model="item.price_net" min="0.00" step="0.01"
                                                class="mt-1 block w-full" required autocomplete="item[][price_net]"
                                                x-on:change.debounce="calculateItem(item)" />
                                            <x-input-error class="mt-2" :messages="$errors->get('item[][price_net]')" />
                                        </div>
                                        <div class="w-full md:w-1/4 px-6">
                                            <x-input-label for="item[][tax_rate]" :value="__('Vat')" />
                                            <select name="item[][tax_rate]" x-bind:name="`item[${item.id}][tax_rate]`"
                                                id="item[][tax_rate]"
                                                class="mt-1 block w-full dark:bg-gray-900  sm:rounded-lg"
                                                x-model="item.tax_rate" x-on:change.debounce="calculateItem(item)">
                                                <option value="23" selected='selected'>23%</option>
                                                <option value="22">22%</option>
                                                <option value="8">8%</option>
                                                <option value="5">5%</option>
                                                <option value="0">0%</option>
                                                <option value="zw">Zwolniony</option>
                                                <option value="np">Nie podlega.</option>
                                            </select>
                                            <x-input-error class="mt-2" :messages="$errors->get('item[][tax_rate]')" />
                                        </div>
                                        <div class="w-full md:w-1/4 px-6">
                                            <x-input-label for="item[][discount]" :value="__('Upust netto')" />
                                            <x-text-input id="item[][discount]"
                                                x-bind:name="`item[${item.id}][discount]`" type="text"
                                                value="0" class="mt-1 block w-full" :value="old('item[][discount]')" required
                                                autofocus autocomplete="item[][discount]" x-model="item.discount"
                                                x-on:change.debounce="calculateItem(item)" />
                                            <x-input-error class="mt-2" :messages="$errors->get('item[][discount]')" />
                                            <p class="text-xs italic">Kwotowa lub %</p>
                                        </div>

                                        <div class="w-full md:w-1/12 px-1 py-7">
                                            <x-danger-button @click="removeField(item)">&times;</x-danger-button>
                                        </div>

                                        <div class="w-full md:w-1/4 px-6">
                                            <x-input-label :value="__('jednostkowa cena brutto')" />
                                            <x-text-input type="text" x-model="item.price_gross"
                                                class="mt-1 block w-full" disabled />
                                        </div>
                                        <div class="w-full md:w-1/4 px-6">
                                            <x-input-label :value="__('Suma netto')" />
                                            <x-text-input type="text" x-model="item.total_price_net"
                                                class="mt-1 block w-full" disabled />
                                        </div>
                                        <div class="w-full md:w-1/4 px-6">
                                            <x-input-label :value="__('Suma brutto')" />
                                            <x-text-input type="text" x-model="item.total_price_gross"
                                                class="mt-1 block w-full" disabled />
                                        </div>

                                        <div class="w-full md:w-1/4 px-6">
                                            <x-input-label :value="__('Suma upustów')" />
                                            <x-text-input type="text" x-model="item.total_price_discount"
                                                class="mt-1 block w-full" disabled />
                                        </div>
                                    </div>
                                </div>

                            </template>

                            <x-danger-button @click.prevent="addNewField()">+ Dodaj pozycję na
                                fakturze</x-danger-button>
                        </div>

                        <div class="pb-7 float-right">
                            <x-primary-button>Generuj fakture</x-primary-button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </form>
    @push('scripts')
        <script>
            function invoiceItems() {
                return {
                    items: [],
                    addNewField(q = 1, pn = 0.00, tr = '23', d = 0.00, n = '', e = null) {
                        this.items.push({
                            id: new Date().getTime() + this.items.length,
                            quantity: q,
                            price_net: pn,
                            tax_rate: tr,
                            discount: d,
                            price_gross: 0.00,
                            total_price_net: 0.00,
                            total_price_gross: 0.00,
                            total_price_discount: 0.00,
                            name: n,
                            error: e,
                        });
                    },

                    removeField(item) {
                        this.items.splice(this.items.indexOf(item), 1);
                    },

                    calculateItem(item) {
                        //create shorthand
                        var calculatedItem = this.items[this.items.indexOf(item)]
                        var discount = 0;
                        //calculate discount
                        if(calculatedItem.discount!=0) {
                            if(calculatedItem.discount.includes("%")) {
                                var discountedAmount = calculatedItem.discount.replace('%', '');
                                if(discountedAmount > 0) {
                                    discount = (discountedAmount / 100) * calculatedItem.price_net;
                                }
                            } else {
                                discount = calculatedItem.discount;
                            }
                        }

                        //calculate total price net
                        calculatedItem.total_price_net = (calculatedItem.quantity * (calculatedItem.price_net - discount)).toFixed(2)
                        //TODO: extend and make more dynamic
                        //calculate gross price per unit
                        switch (calculatedItem.tax_rate) {
                            case "23":
                                calculatedItem.price_gross = ((calculatedItem.price_net - discount) * 1.23)
                                    .toFixed(2)
                                break;
                            case "22":
                                calculatedItem.price_gross = ((calculatedItem.price_net - discount) * 1.22)
                                    .toFixed(2)
                                break;
                            case "8":
                                calculatedItem.price_gross = ((calculatedItem.price_net - discount) * 1.08)
                                    .toFixed(2)
                                break;
                            case "5":
                                calculatedItem.price_gross = ((calculatedItem.price_net - discount) * 1.05)
                                    .toFixed(2)
                                break;
                            default:
                                calculatedItem.price_gross = ((calculatedItem.price_net - discount)).toFixed(2)
                                break;
                        }
                        //sum gross price
                        calculatedItem.total_price_gross = (calculatedItem.price_gross * calculatedItem.quantity).toFixed(2)
                        //sum discounts
                        calculatedItem.total_price_discount = (discount * calculatedItem.quantity).toFixed(2)
                    },
                    //add new fields as counted amount with "old values"
                    init() {
                        @if (old('item') == null)
                            this.addNewField()
                        @else
                            @foreach (old('item') as $i => $item)
                                this.addNewField({{ $item['quantity'] }}, {{ $item['price_net'] }}, {{ $item['tax_rate'] }},
                                    {{ $item['discount'] }},{{ $item['name'] }})
                            @endforeach
                        @endif
                    }
                }
            }
        </script>
    @endpush
</x-app-layout>
