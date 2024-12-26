<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Info sprzedawcy') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Informację pojawią sie na fakturze w sekcji sprzedawca') }}
        </p>
    </header>

    <form method="post" action="{{ route('setting.update') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="seller_company_name" :value="__('Nazwa firmy')" />
            <x-text-input id="seller_company_name" name="seller_company_name" type="text" :value="old('seller_company_name', $settings->seller_company_name ?? '')"  class="mt-1 block w-full"/>
            <x-input-error :messages="$errors->updateSetting->get('seller_company_name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="seller_address" :value="__('Adres firmy (ulica)')" />
            <x-text-input id="seller_address" name="seller_address" type="text" :value="old('seller_address', $settings->seller_address ?? '')"  class="mt-1 block w-full"/>
            <x-input-error :messages="$errors->updateSetting->get('seller_address')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="seller_city" :value="__('Adres firmy (miasto)')" />
            <x-text-input id="seller_city" name="seller_city" type="text" :value="old('seller_city', $settings->seller_city ?? '')"  class="mt-1 block w-full"/>
            <x-input-error :messages="$errors->updateSetting->get('seller_city')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="seller_postal_code" :value="__('Adres firmy (kod pocztowy)')" />
            <x-text-input id="seller_postal_code" name="seller_postal_code" type="text" :value="old('seller_postal_code', $settings->seller_postal_code ?? '')"  class="mt-1 block w-full"/>
            <x-input-error :messages="$errors->updateSetting->get('seller_postal_code')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="seller_country" :value="__('Adres firmy (państwo)')" />
            <x-text-input id="seller_country" name="seller_country" type="text" :value="old('seller_country', $settings->seller_country ?? '')"  class="mt-1 block w-full"/>
            <x-input-error :messages="$errors->updateSetting->get('seller_country')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="seller_nip" :value="__('NIP firmy')" />
            <x-text-input id="seller_nip" name="seller_nip" type="text" :value="old('seller_nip', $settings->seller_nip ?? '')"  class="mt-1 block w-full"/>
            <x-input-error :messages="$errors->updateSetting->get('seller_nip')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="seller_regon" :value="__('REGON firmy')" />
            <x-text-input id="seller_regon" name="seller_regon" type="text" :value="old('seller_regon', $settings->seller_regon ?? '')"  class="mt-1 block w-full"/>
            <x-input-error :messages="$errors->updateSetting->get('seller_regon')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="seller_krs" :value="__('KRS firmy')" />
            <x-text-input id="seller_krs" name="seller_krs" type="text" :value="old('seller_krs', $settings->seller_krs ?? '')"  class="mt-1 block w-full"/>
            <x-input-error :messages="$errors->updateSetting->get('seller_krs')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="seller_email" :value="__('Email sprzedawcy')" />
            <x-text-input id="seller_email" name="seller_email" class="mt-1 block w-full" :value="old('seller_email', $settings->seller_email ?? '')"  autocomplete="email" />
            <x-input-error :messages="$errors->updatePassword->get('seller_email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="seller_phone" :value="__('Telefon sprzedawcy')" />
            <x-text-input id="seller_phone" name="seller_phone" class="mt-1 block w-full" :value="old('seller_phone', $settings->seller_phone ?? '')"  autocomplete="phone" />
            <x-input-error :messages="$errors->updatePassword->get('seller_phone')" class="mt-2" />
        </div>

        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Domyślne wartości') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Domyślne wartości przy generowaniu faktury') }}
            </p>
        </header>

        <div>
            <x-input-label for="invoice_default_issuer" :value="__('Domyślne dane osoby wystawiające fakturę')" />
            <x-text-input id="invoice_default_issuer" name="invoice_default_issuer" :value="old('invoice_default_issuer', $settings->invoice_default_issuer ?? '')"  class="mt-1 block w-full" />
            <x-input-error :messages="$errors->updatePassword->get('invoice_default_issuer')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="invoice_default_place" :value="__('Domyślne miejsce wystawienia faktury')" />
            <x-text-input id="invoice_default_place" name="invoice_default_place" :value="old('invoice_default_place', $settings->invoice_default_place ?? '')"  class="mt-1 block w-full" />
            <x-input-error :messages="$errors->updatePassword->get('invoice_default_place')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="invoice_default_tax_rate" :value="__('Domyślna wartość podatku VAT')" />
            <select name="invoice_default_tax_rate" id="invoice_default_tax_rate" class="mt-1 block w-full dark:bg-gray-900  sm:rounded-lg text-white">
                <option value="23" @if($settings==null || $settings->invoice_default_tax_rate=='23')selected='selected' @endif>23%</option>
                <option value="22" @if( $settings?->invoice_default_tax_rate=='22') selected='selected' @endif >22%</option>
                <option value="8" @if( $settings?->invoice_default_tax_rate=='8') selected='selected' @endif>8%</option>
                <option value="5" @if( $settings?->invoice_default_tax_rate=='5') selected='selected' @endif>5%</option>
                <option value="0" @if( $settings?->invoice_default_tax_rate=='0') selected='selected' @endif>0%</option>
                <option value="zw" @if( $settings?->invoice_default_tax_rate=='zw') selected='selected' @endif>Zwolniony</option>
                <option value="np" @if( $settings?->invoice_default_tax_rate=='np') selected='selected' @endif>Nie podlega.</option>
            </select>
        </div>

        <div>
            <x-input-label for="invoice_default_pattern" :value="__('Domyślny szablon generowania faktury')" />
            <x-text-input id="invoice_default_pattern" name="invoice_default_pattern" :value="old('invoice_default_pattern', $settings->invoice_default_pattern ?? '{n}/{m}/{y}')"  class="mt-1 block w-full" />
            <x-input-error :messages="$errors->updatePassword->get('invoice_default_pattern')" class="mt-2" />
            //todo:show example
        </div>

        <div>
            <x-input-label for="invoice_default_template" :value="__('Domyślny szablon faktury')" />
            <x-text-input id="invoice_default_template" name="invoice_default_template" :value="old('invoice_default_template', $settings->invoice_default_place ?? 'default')" disabled class="mt-1 block w-full" />
            <x-input-error :messages="$errors->updatePassword->get('invoice_default_template')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Zapisz') }}</x-primary-button>
        </div>
    </form>
</section>
