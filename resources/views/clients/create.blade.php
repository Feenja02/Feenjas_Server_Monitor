<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Client bearbeiten') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Client bearbeiten
                </div>
                <br>
                <form method="POST" action="{{ route('client.create')}}">
                @csrf
                <!-- Name -->
                    <div class="mr-4 ml-4 mt-4">
                        <x-label for="name" :value="__('Name')"/>

                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                 required autofocus/>
                    </div>

                    <!-- Location -->
                    <div class="mr-4 ml-4 mt-4">
                        <x-label for="location" :value="__('Location')"/>

                        <x-input id="location" class="block mt-1 w-full" type="text" name="location"
                                 :value="old('location')"
                                 required/>
                    </div>
                    <br>
                    <div class="mr-4 ml-4 mt-4"> Address</div>
                    <hr>
                    <div class="flex flex-row">
                        <!-- Street -->
                        <div class="mr-4 ml-4 mt-4">
                            <x-label for="street" :value="__('Street')"/>

                            <x-input id="street" class="block mt-1 w-full" type="text" name="street"
                                     :value="old('street')" required/>
                        </div>

                        <!-- Number -->
                        <div class="mr-4 ml-4 mt-4">
                            <x-label for="number" :value="__('Number')"/>

                            <x-input id="number" class="block mt-1 w-full" type="number" name="number"
                                     :value="old('number')" required/>
                        </div>
                    </div>
                    <!-- ZIP Code -->
                    <div class="mr-4 ml-4 mt-4">
                        <x-label for="zip_code" :value="__('ZIP Code')"/>

                        <x-input id="zip_code" class="block mt-1 " type="text" name="zip_code"
                                 :value="old('zip_code')" required/>
                    </div>

                    <!-- City -->
                    <div class="mr-4 ml-4 mt-4">
                        <x-label for="city" :value="__('City')"/>

                        <x-input id="city" class="block mt-1 " type="text" name="city"
                                 :value="old('city')" required/>
                    </div>
                    <div class="flex items-center justify-end mt-4">

                        <x-button class="mr-4 bg-green-400">
                            {{ __('Save') }}
                        </x-button>
                    </div>
                </form>
                <div class="mr-4 ml-4 mt-4 mb-4" x-data="{ tooltip: false }" x-on:mouseover="tooltip = true"
                     x-on:mouseleave="tooltip = false">
                    <a href="{{route('clients')}}">
                        <x-icon-back/>
                    </a>
                    <div x-show="tooltip">
                        <x-tooltip class="bg-gray-500 -translate-y-14">{{ __('Back') }}</x-tooltip>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
