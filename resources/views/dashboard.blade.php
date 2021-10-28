<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @foreach(\App\Models\Client::query()->get() as $client)
        @php
            $values=$client->datavalues->last();
        @endphp
        <x-content-card>
            <x-slot name="header">
                <div class="flex flex-row">
                    @if($values->created_at->addMinutes(5) < \Illuminate\Support\Carbon::now() && $client->is_activated == 1)
                        <div class="mt-0" x-data="{ tooltip: false }" x-on:mouseover="tooltip = true"
                             x-on:mouseleave="tooltip = false">
                            <x-icon-client-down/>
                            <div x-show="tooltip">
                                <x-tooltip
                                    class="bg-red-500 -translate-y-14">{{ __('messages.client_down_icon') }}</x-tooltip>
                            </div>
                        </div>
                    @endif
                    <div>
                        {{$client->name }}
                    </div>
                    <div>
                        @if($client->is_activated === 1)
                            <div class="mt-0" x-data="{ tooltip: false }" x-on:mouseover="tooltip = true"
                                 x-on:mouseleave="tooltip = false">
                                <a class="" href="{{route('client.deactivate', ['client' => $client])}}">
                                    <x-icon-activated/>
                                </a>
                                <div x-show="tooltip">
                                    <x-tooltip
                                        class="bg-green-500 -translate-y-14">{{ __('messages.click_to_deactivate') }}</x-tooltip>
                                </div>
                            </div>
                        @else
                            <div class="mt-0" x-data="{ tooltip: false }" x-on:mouseover="tooltip = true"
                                 x-on:mouseleave="tooltip = false">
                                <a class="" href="{{route('client.activate', ['client' => $client])}}">
                                    <x-icon-inactive/>
                                </a>
                                <div x-show="tooltip">
                                    <x-tooltip
                                        class="bg-green-500 -translate-y-14">{{ __('messages.click_to_activate') }}</x-tooltip>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </x-slot>

            <x-slot name="body">
                @if($client->is_activated === 1)
                    <div class="space-x-4">
                        {{--@dump($values)--}}
                        <x-val-display-block :value_temp1="number_format($values->temperature,2,',','.')"
                                             :value_hum1="number_format($values->humidity,2, ',' , '.')">

                        </x-val-display-block>
                    </div>
                @else
                    {{ __('messages.client_not_activated') }}
                @endif
            </x-slot>
        </x-content-card>
    @endforeach
</x-app-layout>
