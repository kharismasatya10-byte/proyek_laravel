<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <h2>Sistem Informasi Surat</h2>
        <nav>
            <a href="{{route('dashboard') }}">dashboard</a>
            <a href="{{route('surat-masuk.index') }}">Surat Masuk</a>
            <a href="{{ route('surat-keluar.index') }}">Surat Keluar</a>
            
            <!-- Tambahan Tahap 7: Info User & Logout -->
            @auth
                <span style="margin-left: 15px;">Masuk sebagai: {{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" style="display:inline">
                    @csrf
                    <button type="submit">Keluar</button>
                </form>
            @endauth
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>Sistem Informasi Surat</p>
    </footer>
</body>
</html>