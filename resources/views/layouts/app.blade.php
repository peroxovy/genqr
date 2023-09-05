<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body>
    <div class="relative bg-gradient-to-tr from-lime-400 via-teal-400 to-green-400">
        <div class="min-h-screen w-full ">
            @auth
            <nav>
                @livewire('navigation')
            </nav>
            @endauth
            <main class="flex justify-center">
                {{ $slot }}
            </main>
        </div>
    </div>
    @livewireScripts
    @livewire('wire-elements-modal')
</body>
</html>
