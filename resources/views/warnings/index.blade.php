<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Warnungen') }}
        </h2>
    </x-slot>
    {{--@dump(Auth::user()->notifications)--}}
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Warnungen
                </div>
                <br>
                @foreach(Auth::user()->notifications as $notification)
                    <div
                        class="flex w-full max-w-xl mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <div class="flex items-center justify-center w-12 bg-red-500">
                            <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z"/>
                            </svg>
                        </div>
                        <div class="px-4 py-2 pb-5  -mx-3">
                            <div class="mx-3">
                                <span class="font-semibold text-red-500 dark:text-red-400">@if($notification->type == 'App\Notifications\ClientDownNotification')
                                        Client
                                        Down @elseif($notification->type == 'App\Notifications\WarningNotification')
                                        Warnung @endif</span>
                                <p class="text-sm text-gray-600 dark:text-gray-200">@if($notification->type == 'App\Notifications\ClientDownNotification')
                                        Der Client (Name aus data kriegen) sendet keine Werte
                                        mehr.@elseif($notification->type == 'App\Notifications\WarningNotification')
                                        Grenzwerte für Temperatur oder Luftfeuchtigkeit wurden überschritten @endif</p>
                            </div>
                            <div>
                                <p class="text-sm text-right text-gray-600 dark:text-gray-200">{{date('d.m.Y H:m', strtotime($notification->created_at))}}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach
                <br>
            </div>
        </div>
    </div>
</x-app-layout>