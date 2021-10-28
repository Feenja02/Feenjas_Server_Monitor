@props(['danger' => false])

<div {{ $attributes->merge(['class' => 'absolute top-0 left-0 flex items-center justify-center w-full h-full']) }} style="background-color: rgba(0,0,0,.5);">
    <!-- Dialogbox -->
    <div class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0" @click.away="open = false">
        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                @if($danger == true)
                    <svg class="h-6 w-6 text-red-600" x-description="Heroicon name: outline/exclamation" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                @endif
                {{ $header }}
            </h3>
            <div class="mt-2">
                <p class="text-sm text-gray-500">
                    {{ $body }}
                </p>
            </div>
        </div>
        <!-- Footer buttons  -->
        <div class="bg-gray-50 mt-4 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            {{ $footer }}
        </div>
    </div>
</div>
