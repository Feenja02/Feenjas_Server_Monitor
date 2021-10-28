<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nutzer bearbeiten') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Nutzer bearbeiten
                </div>
                <br>
                <form method="POST" action="{{ route('user.update', ['user'=>$user]) }}">
                @csrf
                <!-- Name -->
                    <div class="mr-4 ml-4 mt-4">
                        <x-label for="name" :value="__('Name')"/>

                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name"
                                 required autofocus/>
                    </div>
                    <!-- Email Address -->
                    <div class="mr-4 ml-4 mt-4">
                        <x-label for="email" :value="__('Email')"/>
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email"
                                 required/>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-button class="mr-4 bg-green-400">
                            {{ __('Save') }}
                        </x-button>
                    </div>
                </form>
                <br>
                <div class="mr-4 ml-4 mt-4"> Passwort</div>
                <hr>
                <div class="mr-4 ml-4 mt-4"> Klick auf Button versendet Mail an User zum Zurücksetzen des PW</div>
                <!-- Password -->
                <div class="mr-4 ml-4 mt-4 mb-4">
                    <form method="POST" action="#">{{--{{ route('password.email') }}--}}
                        @csrf
                        <div class="flex items-center justify-center mt-4 w-full">
                            <x-button>
                                Passwort zurücksetzen
                                <x-icon-mail/>
                                <x-icon-chevron-double-right/>
                            </x-button>
                        </div>
                    </form>
                </div>
                <hr>
                <div class="mr-4 ml-4 mt-4 mb-4" x-data="{ tooltip: false }" x-on:mouseover="tooltip = true"
                     x-on:mouseleave="tooltip = false">
                    <a href="{{route('users')}}">
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
