<x-app-layout>
    <form method="post" action="{{ route('buyer.store') }}" class="mt-6 space-y-6">
        <x-content-header route="buyer.index" buttonText="Lista nabywców">
            {{ __('Dodaj nowego nabywce') }}
        </x-content-header>
        @csrf
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <x-forms.new-buyer></x-forms.new-buyer>
                        </div>
                        <div class="pb-7 float-right">
                            <x-primary-button>Dodaj nabywce do bazy</x-primary-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
