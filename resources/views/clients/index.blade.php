<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Liste der Clients
                </div>
                <br>
                @php
                    $clients = \App\Models\Client::query()->get()
                @endphp
                <div class="mr-5 ml-5">
                    <table class="table-fixed">
                        <thead>
                        <tr>
                            <th class="w-1/4">Name</th>
                            <th class="w-1/8">Client-ID</th>
                            <th class="w-1/6">Standort</th>
                            <th class="w-1/6">Straße, Nummer</th>
                            <th class="w-1/6">PLZ</th>
                            <th class="w-1/6">Ort</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td class="px-4 py-2 border">{{$client->name}}</td>
                                <td class="px-4 py-2 border">{{$client->id}}</td>
                                <td class="px-4 py-2 border">{{$client->location}}</td>
                                <td class="px-4 py-2 border">{{$client->street}} {{$client->number}}</td>
                                <td class="px-4 py-2 border">{{$client->zip_code}}</td>
                                <td class="px-4 py-2 border">{{$client->city}}</td>
                                @if(Auth::user()->email == 'ag@lubey.ag')
                                    <td class="px-2 py-2">
                                        <div class="mt-0" x-data="{ tooltip: false }" x-on:mouseover="tooltip = true"
                                             x-on:mouseleave="tooltip = false">
                                            <a href="{{route('client.edit', ['client' => $client])}}" >
                                                <x-icon-edit/>
                                            </a>
                                            <div x-show="tooltip">
                                                <x-tooltip class="bg-green-500 -translate-y-14">{{ __('Edit') }}</x-tooltip>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="">
                                        <div class="mt-0" x-data="{ open: false, tooltip: false }" x-on:mouseover="tooltip = true"
                                             x-on:mouseleave="tooltip = false">
                                            <a class="modal-open" href="#" @click.prevent="open = true">
                                                <x-icon-del/>
                                            </a>
                                            <div x-show="tooltip">
                                                <x-tooltip class="bg-red-500 -translate-y-14">{{ __('Delete') }}</x-tooltip>
                                            </div>
                                            <x-modal x-show="open" :danger="true">
                                                <x-slot name="header">
                                                    {{ __('messages.delete_client') }}
                                                </x-slot>
                                                <x-slot name="body">
                                                    {{ __('messages.delete_client_message') }}
                                                </x-slot>
                                                <x-slot name="footer">
                                                    <x-link href="{{route('client.destroy', ['client' => $client])}}"
                                                            :layout="'danger'">{{ __('Delete') }}</x-link> {{--{{route('client.destroy', ['sample' => $sample])}}--}}
                                                    <x-button @click="open = false" class="mr-3">{{ __('Cancel') }}</x-button>
                                                </x-slot>
                                            </x-modal>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                @if(Auth::user()->email == 'ag@lubey.ag')
                    <p class="text-right pr-3 pb-3"><a href="#"
                                                       class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Neuer
                            Client</a></p>
                @endif
            </div>

        </div>
    </div>

</x-app-layout>
