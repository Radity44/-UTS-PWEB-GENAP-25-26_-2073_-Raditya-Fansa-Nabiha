<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MyRencana')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> {{-- CSS utama --}}
</head>
<body>
    @if (!request()->is('login') && !request()->is('login/process'))
        <x-navbar />
    @endif

    <main class="container py-4">
        @yield('content')
    </main>

    @if (!request()->is('login') && !request()->is('login/process'))
        <x-footer />
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
