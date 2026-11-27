@props([
    'title' => null,
    'description' => null,
    'image' => null,
    'type' => 'website',
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <x-seo-meta :title="$title" :description="$description" :image="$image" :type="$type" />

    @stack('preloads')
    {{--
        Lets entrance animations hide content before it first paints. If the
        main script has not started within 3 seconds, the class is removed so
        every section shows normally instead of staying hidden.
    --}}
    <script>
        document.documentElement.classList.add('js');
        setTimeout(function () {
            if (!document.documentElement.classList.contains('animations-ready')) {
                document.documentElement.classList.remove('js');
            }
        }, 3000);
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col bg-white font-sans text-ink antialiased">
    <x-site-header />

    <main id="main-content" class="flex-1 overflow-x-clip">
        {{ $slot }}
    </main>

    <x-site-footer />
    <x-whatsapp-button />
    <x-back-to-top />

    @stack('page-end')
</body>
</html>
