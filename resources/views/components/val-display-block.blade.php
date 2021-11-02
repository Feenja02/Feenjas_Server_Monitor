
        <div
            class="inline-block box-content h-32 w-32 p-4 border-4 sm:rounded-lg @if($attributes['value_temp1'] < 18 || $attributes['value_temp1'] > 27 ) bg-red-500 border-red-400 animate-pulse @else border-green-400 @endif">
            <div
                class="border-b @if($attributes['value_temp1'] < 18 || $attributes['value_temp1'] > 27) border-white @else border-green-400 @endif">
                <p class="font-bold text-center @if($attributes['value_temp1'] < 18 || $attributes['value_temp1'] > 27) text-white @endif">
                    {{__('messages.Temp')}}
                </p>
            </div>
            <br><br>
            <div class="text-center">
                <p class="text-4xl font-bold @if($attributes['value_temp1'] < 18 || $attributes['value_temp1'] > 27) text-white @endif">
                    {{$attributes['value_temp1']}}°C
                </p>
            </div>
        </div>
        <div
            class="inline-block box-content h-32 w-32 p-4 border-4 sm:rounded-lg @if($attributes['value_hum1'] < 30 || $attributes['value_hum1'] > 60 ) bg-red-500 border-red-400 animate-pulse @else border-green-400 @endif">
            <div
                class="border-b @if($attributes['value_hum1'] < 30 || $attributes['value_hum1'] > 60) border-white @else border-green-400 @endif">
                <p class="font-bold text-center @if($attributes['value_hum1'] < 30 || $attributes['value_hum1'] > 60) text-white @endif">
                    {{__('messages.Hum')}}
                </p>
            </div>
            <br><br>
            <div class="text-center">
                <p class="text-4xl font-bold @if($attributes['value_hum1'] < 30 || $attributes['value_hum1'] > 60) text-white @endif">
                    {{$attributes['value_hum1']}}%
                </p>
            </div>
        </div>

