<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Annunci') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <nav>
            <div class="nav-container">
                <a href="{{ url('/') }}" class="active">Home</a>
            </div>
        </nav>

        <main>
            <h1>Annunci</h1>

            @forelse ($annunci as $annuncio)
                <a href="{{ route('annunci.show', $annuncio) }}" class="card-link">
                    <div class="card">
                        <h2>{{ $annuncio->titolo }}</h2>
                        <p>{{ $annuncio->testo }}</p>
                        @if ($annuncio->citta)
                            <p class="location">📍 {{ $annuncio->citta->name }}</p>
                        @endif
                    </div>
                </a>
            @empty
                <p class="empty">Nessun annuncio disponibile.</p>
            @endforelse
        </main>
    </body>
</html>
