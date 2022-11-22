<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            イベント詳細
        </h2>
    </x-slot>

    <div class="pt-8 pb-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-8 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="max-w-2xl mx-auto">
                    <x-jet-validation-errors class="mb-4" />

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{ route('events.reserve', ['id' => $event->id]) }}">
                        @csrf
                        <div>
                            <x-jet-label for="event_name" value="イベント名" />
                            {{ $event->name }}
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="information" value="イベント詳細" />
                            {!! nl2br(e($event->information)) !!}
                        </div>

                        <div class="md:flex justify-between mt-4">
                            <div>
                                <x-jet-label for="event_date" value="イベントの日付" />
                                {{ $event->eventDate }}
                            </div>

                            <div>
                                <x-jet-label for="start_time" value="開始時間" />
                                {{ $event->start_date }}
                            </div>

                            <div>
                                <x-jet-label for="end_time" value="終了時間" />
                                {{ $event->end_date }}
                            </div>
                        </div>

                        <div class="md:flex justify-between items-end mt-4">
                            <div>
                                <x-jet-label for="max_people" value="定員" />
                                {{ $event->max_people }}
                            </div>
                            <div>
                                <x-jet-label for="reservable_people" value="予約人数" />
                                <select name="reservable_people">
                                    @for ($i = 1; $i <= $reservablePeople; $i++)
                                        <option value={{ $i }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <input type="hidden" name="id" value="{{ $event->id }}">
                            <x-jet-button class="mt-4">
                                予約
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
