<!DOCTYPE html>
<html lang="en">
<head>
    @livewireStyles
</head>
<body>
    Livewire-Test

    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>

    {{-- <livewire:counter /> --}}
    @livewire("counter")
    
    @livewireScripts
</body>
</html>
