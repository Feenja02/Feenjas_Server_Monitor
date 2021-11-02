<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            {{--<a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>--}}
            <p class="text-4xl">Server Monitor</p>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('messages.email')"/>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                         autofocus/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('messages.password')"/>

                <x-input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required autocomplete="current-password"/>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('messages.remember_me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                    <div class="mt-0" x-data="{ open: false }">
                        <a class="underline text-sm modal-open" href="#" @click.prevent="open = true">
                            {{ __('messages.forgot_pw') }}
                        </a>
                        <x-modal x-show="open">
                            <x-slot name="header">
                                {{ __('messages.forgot_pw') }}
                            </x-slot>
                            <x-slot name="body">
                                {{ __('messages.forgot_pw_message', ['ADMIN'=>'Anja', 'EMAIL'=>'ag@lubey.ag']) }}
                            </x-slot>
                            <x-slot name="footer">
                                <x-button @click="open = false" class="mr-3">{{ __('messages.close') }}</x-button>
                            </x-slot>
                        </x-modal>
                    </div>
                <x-button class="ml-3">
                    {{ __('messages.log_in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
