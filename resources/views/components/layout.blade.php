<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $headtitle }}</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>

<body>
    <div class="min-h-full">

        <x-navigation></x-navigation>
        <main>
            <div class="px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>

</html>
