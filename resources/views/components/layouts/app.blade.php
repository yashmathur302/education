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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col bg-white font-sans text-ink antialiased">
    <x-site-header />

    <main id="main-content" class="flex-1">
        {{ $slot }}
    </main>

    <x-site-footer />
    <x-whatsapp-button />
    <x-back-to-top />

    @stack('page-end')
</body>
</html>
