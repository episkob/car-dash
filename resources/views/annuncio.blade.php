@php use Illuminate\Support\Facades\Storage; @endphp
<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $annuncio->titolo }} — {{ config('app.name', 'Annunci') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <nav>
            <div class="nav-container">
                <a href="{{ url('/') }}">Home</a>
            </div>
        </nav>

        <main>
            <a href="{{ url('/') }}" class="back-link">← Torna agli annunci</a>

            <div class="card detail-card">

                @if ($annuncio->immagini->isNotEmpty())
                    @php $imgs = $annuncio->immagini; @endphp
                    <div
                        class="gallery"
                        x-data="{ active: 0 }"
                    >
                        {{-- Большое активное фото --}}
                        <div class="gallery-main">
                            @foreach ($imgs as $i => $img)
                                <img
                                    src="{{ Storage::disk('public')->url($img->path) }}"
                                    alt="{{ $img->nome ?: $annuncio->titolo }}"
                                    x-show="active === {{ $i }}"
                                    class="gallery-main-img"
                                >
                            @endforeach
                        </div>

                        {{-- Миниатюры --}}
                        @if ($imgs->count() > 1)
                            <div class="gallery-thumbs">
                                @foreach ($imgs as $i => $img)
                                    <button
                                        type="button"
                                        class="gallery-thumb"
                                        :class="{ 'active': active === {{ $i }} }"
                                        @click="active = {{ $i }}"
                                    >
                                        <img
                                            src="{{ Storage::disk('public')->url($img->path) }}"
                                            alt="{{ $img->nome ?: $annuncio->titolo }}"
                                        >
                                    </button>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endif

                <div class="detail-body">
                    <h1>{{ $annuncio->titolo }}</h1>

                    @if ($annuncio->citta)
                        <p class="location">📍 {{ $annuncio->citta->name }}</p>
                    @endif

                    <p class="detail-text">{{ $annuncio->testo }}</p>
                </div>
            </div>
        </main>
    </body>
</html>
