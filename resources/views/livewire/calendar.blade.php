<div>
    <div class="text-center text-sm">
        日付を選択してください。本日から最大14日先まで選択可能です。
    </div>
    <input id="calendar" class="block my-2 rounded mx-auto" type="text" name="calendar" value="{{ $currentDate }}"
        wire:change="getDate($event.target.value)" />

    <div class="flex border border-green-400 mx-auto">
        <x-calendar-time />
        @for ($i = 0; $i < 7; $i++)
            <div class="w-32">
                <div class="py-1 px-2 border border-gray-200 text-center">{{ $currentWeek[$i]['day'] }}</div>
                <div class="py-1 px-2 border border-gray-200 text-center">{{ $currentWeek[$i]['dayOfWeek'] }}</div>
                @for ($j = 0; $j < 21; $j++)
                    <div class="py-1 px-2 h-8 border border-gray-200">10:00</div>
                @endfor
            </div>
        @endfor
    </div>

    @foreach ($events as $event)
        <p>{{ $event->start_date }}</p>
    @endforeach
</div>