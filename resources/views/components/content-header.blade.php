@props([
    'route' => '',
    'buttonText' => '',
    'showButton'   => 'true',
    'submitButton' => 'false',
    ])

<x-slot name="header">
    <div class="pb-6">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight float-left">
            {{ $slot }}
        </h2>

        @if($showButton!='false')
            <div class="float-right">
                @if($submitButton=='true')
                    <x-primary-button>{{ $buttonText }}</x-primary-button>
                @else
                    <a href="{{route($route)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{$buttonText}}</a>
                @endif
            </div>
        @endif
    </div>
</x-slot>
