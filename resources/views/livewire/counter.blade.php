<div style="text-align: center">
    <button wire:click="increment">+</button>
    <h1>{{ $count }}</h1>
    こんにちは {{ $name }}さん<br>
    {{-- ms待ってから通信 --}}
    {{-- <input type="text" wire:model.debounce.2000ms="name"> --}}
    {{-- フォーカスが外れたタイミングで --}}
    <input type="text" wire:model.lazy="name">

</div>
