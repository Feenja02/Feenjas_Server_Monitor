<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.edit_user') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ __('messages.edit_user') }}
                </div>
                <br>
                <form method="POST" action="{{ route('user.update', ['user'=>$user]) }}">
                @csrf
                <!-- Name -->
                    <div class="mr-4 ml-4 mt-4">
                        <x-label for="name" :value="__('messages.name')"/>

                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name"
                                 required autofocus/>
                    </div>
                    <!-- Email Address -->
                    <div class="mr-4 ml-4 mt-4">
                        <x-label for="email" :value="__('messages.email')"/>
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email"
                                 required/>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-button class="mr-4 bg-green-400">
                            {{ __('messages.save') }}
                        </x-button>
                    </div>
                </form>
                <br>
                <div class="mr-4 ml-4 mt-4"> {{__('messages.password')}}</div>
                <hr>
                <div class="mr-4 ml-4 mt-4"> {{ __('messages.pw_reset_info') }}</div>
                <!-- Password -->
                <div class="mr-4 ml-4 mt-4 mb-4">
                    @if(session('status'))
                        <div class="py-3 px-5 mb-4 bg-green-100 text-green-900 text-sm rounded-md border border-green-200" role="alert">{{session('status')}}</div>
                    @else
                        <div>
                            <ul class="p-0 m-0" style="list-style: none;">
                                @foreach($errors->all() as $error)
                                    <li class="py-3 px-5 mb-4 bg-red-100 text-red-900 text-sm rounded-md border border-red-200" role="alert">{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        <input type="hidden" name="email" id="email" value="{{$user->email}}"/>
                        @csrf
                        <div class="flex items-center justify-center mt-4 w-full">
                            <x-button id="resetPasswortButton">
                                {{ __('messages.reset_pw') }}
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
                        <x-tooltip class="bg-gray-500 -translate-y-14">{{ __('messages.back') }}</x-tooltip>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function(){
                {{--$('#resetPasswortButton').on('click',function(){--}}
                {{--    let data = {'email':$('#email').val()};--}}
                {{--    let url = '{{route('password.email')}}';--}}
                {{--    $.ajax({--}}
                {{--        method:'post',--}}
                {{--        url:url,--}}
                {{--        data: data,--}}
                {{--        headers: {'X-CSRF-TOKEN':'{{csrf_token()}}'},--}}
                {{--        success: function(resp){--}}
                {{--            console.log(resp);--}}
                {{--        }--}}
                {{--    })--}}
                {{--});--}}
            });
        </script>
    @endpush
</x-app-layout>
