<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nutzer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Liste der Nutzer
                </div>

                <br>
                @php
                    $users = \App\Models\User::query()->get()
                @endphp
                <div class="mr-5 ml-5">
                    <table class="table-fixed">
                        <thead>
                        <tr>
                            <th class="w-1/2">Name</th>
                            <th class="w-1/2">E-Mail</th>
                            <th class="w-1/5">Rolle</th>
                            @if(Auth::user()->email == 'ag@lubey.ag')
                                <th class="w-1/5"></th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            @if($user->name == Auth::user()->name)
                                @continue
                            @endif
                            {{--@dump($user)--}}
                            <tr>
                                <td class="px-4 py-2 border">{{$user->name}}</td>
                                <td class="px-4 py-2 border">{{$user->email}}</td>
                                <td class="px-4 py-2 border">@if($user->email == 'ag@lubey.ag')Admin @else
                                        Nutzer @endif</td>
                                @if(Auth::user()->email == 'ag@lubey.ag')
                                    <td class="px-2 py-2">
                                        <x-button class="bg-green-300"><a href="{{ route('edit_user') }}"
                                                                          class="text-left text-white btn"><i
                                                    class="fas fa-pen"></i></a></x-button>
                                    </td>
                                    <td class="">
                                        <x-button class="bg-red-300"><a href="#"
                                                                          class="text-left text-white btn"><i class="fas fa-trash-alt"></i></a></x-button>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{--<p class="font-bold text-green-400">{{Auth::user()->name}}</p>--}}
                {{-- @foreach($users as $user)
                     @if($user->name == Auth::user()->name)
                         @continue
                     @endif
                     <div class="pl-6 pr-6 pb-2 pt-2 flex-col text-left border-b space-x-4">
                         <p class="inline">{{$user->name}}</p>
                         <p class="inline">{{$user->email}}</p>
                     </div>
                 @endforeach--}}
                <br>
                @if(Auth::user()->email == 'ag@lubey.ag')
                    <p class="text-right pr-3 pb-3"><a href="{{ route('create_user') }}"
                                                       class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">New
                            User</a></p>
                @endif
            </div>

        </div>
    </div>

</x-app-layout>
