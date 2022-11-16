<div>
    <div class="text-center text-sm">
        日付を選択してください。本日から最大14日先まで選択可能です。
    </div>
    <input id="calendar" class="block my-2 rounded mx-auto" type="text" name="calendar" value="{{ $currentDate }}"
        wire:change="getDate($event.target.value)" />

    <div class="flex border border-green-400 mx-auto">
        <x-calendar-time />
        <x-day />
        <x-day />
        <x-day />
        <x-day />
        <x-day />
        <x-day />
        <x-day />
    </div>

    {{ $currentDate }}
    <div class="flex">
        @for ($day = 0; $day < 7; $day++)
            {{ $currentWeek[$day] }}
        @endfor
    </div>

    @foreach ($events as $event)
        <p>{{ $event->start_date }}</p>
    @endforeach
</div>
