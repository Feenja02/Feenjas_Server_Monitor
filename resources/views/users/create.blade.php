<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.create_user') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ __('messages.create_user') }}
                </div>
                <br>
                <form method="POST" action="{{ route('create_user') }}">
                @csrf
                <!-- Name -->
                    <div class="mr-4 ml-4 mt-4">
                        <x-label for="name" :value="__('messages.name')"/>
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                 required autofocus/>
                    </div>
                    <!-- Email Address -->
                    <div class="mr-4 ml-4 mt-4">
                        <x-label for="email" :value="__('messages.email')"/>
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                                 required/>
                    </div>
                    <!-- Password -->
                    <div class="mr-4 ml-4 mt-4">
                        <x-label for="password" :value="__('messages.password')"/>
                        <x-input id="password" class="block mt-1 w-full"
                                 type="password"
                                 name="password"
                                 required autocomplete="new-password"/>
                    </div>
                    <!-- Confirm Password -->
                    <div class="mr-4 ml-4 mt-4">
                        <x-label for="password_confirmation" :value="__('messages.confirm_password')"/>
                        <x-input id="password_confirmation" class="block mt-1 w-full"
                                 type="password"
                                 name="password_confirmation" required/>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-button class="mr-4 bg-green-400">
                            {{ __('messages.create') }}
                        </x-button>
                    </div>
                </form>
                <div class="mr-4 ml-4 mt-4 mb-4" x-data="{ tooltip: false }" x-on:mouseover="tooltip = true"
                     x-on:mouseleave="tooltip = false">
                    <a href="{{route('users')}}">
                        <x-icon-back/>
                    </a>
                    <div x-show="tooltip">
                        <x-tooltip class="bg-gray-500 -translate-y-14">{{ __('messages.back') }}</x-tooltip>
                    </div>
                </div>
                <br>
            </div>

        </div>
    </div>
</x-app-layout>
