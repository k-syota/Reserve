<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body>
    <p class="text-red-500">
        Livewire-form
    </p>

    {{-- <livewire:counter /> --}}
    @livewire('register')

    @livewireScripts
</body>

</html>
