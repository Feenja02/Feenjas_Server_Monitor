<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nutzer anlegen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Neuen Nutzer anlegen
                </div>
                <br>
                <form method="POST" action="{{ route('create_user') }}">
                @csrf

                <!-- Name -->
                    <div class="mr-4 ml-4 mt-4">
                        <x-label for="name" :value="__('Name')" />

                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                    </div>

                    <!-- Email Address -->
                    <div class="mr-4 ml-4 mt-4">
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    </div>

                    <!-- Password -->
                    <div class="mr-4 ml-4 mt-4">
                        <x-label for="password" :value="__('Password')" />

                        <x-input id="password" class="block mt-1 w-full"
                                 type="password"
                                 name="password"
                                 required autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mr-4 ml-4 mt-4">
                        <x-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-input id="password_confirmation" class="block mt-1 w-full"
                                 type="password"
                                 name="password_confirmation" required />
                    </div>

                    <div class="flex items-center justify-end mt-4">

                        <x-button class="mr-4 bg-green-400">
                            {{ __('Create') }}
                        </x-button>
                    </div>
                </form>
                <p class="text-left pr-3 pb-3"> <a href="{{ route('users') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Back</a></p>
                <br>


            </div>

        </div>
    </div>

</x-app-layout>
