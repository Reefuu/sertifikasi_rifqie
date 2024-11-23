<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $headtitle }}</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="min-h-full">

        <x-navigation></x-navigation>
        <main>
            <div class="px-4 py-6 sm:px-6 lg:px-8">
                <x-message></x-message>
                {{ $slot }}
            </div>
        </main>
    </div>
</body>

</html>
