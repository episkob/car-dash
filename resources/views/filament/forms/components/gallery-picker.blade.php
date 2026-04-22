@php
    use Illuminate\Support\Facades\Storage;

    $statePath   = $getStatePath();
    $state       = $getState() ?? [];
    $allImages   = $getGalleryImages();

    $imagesData  = $allImages->map(fn($img) => [
        'id'   => $img->id,
        'url'  => Storage::disk('public')->url($img->path),
        'nome' => $img->nome ?: basename($img->path),
    ])->values()->toArray();
@endphp

<div
    x-data="{
        open: false,
        selected: @js($state),
        images: @js($imagesData),

        get selectedImages() {
            return this.images.filter(img => this.selected.includes(img.id));
        },

        toggle(id) {
            const idx = this.selected.indexOf(id);
            idx > -1 ? this.selected.splice(idx, 1) : this.selected.push(id);
        },

        isSelected(id) {
            return this.selected.includes(id);
        },

        confirm() {
            $wire.set('{{ $statePath }}', this.selected);
            this.open = false;
        },

        cancel() {
            this.selected = @js($state);
            this.open = false;
        }
    }"
    class="space-y-3"
>
    {{-- Preview delle immagini selezionate --}}
    <div class="flex flex-wrap gap-2 min-h-[2.5rem] items-start">
        <template x-if="selectedImages.length === 0">
            <p class="text-sm text-gray-400 italic self-center">Nessuna immagine selezionata</p>
        </template>
        <template x-for="img in selectedImages" :key="img.id">
            <div class="relative group">
                <img
                    :src="img.url"
                    :alt="img.nome"
                    class="h-20 w-24 object-cover rounded-lg border border-gray-200 dark:border-gray-700 shadow-sm"
                >
                <button
                    type="button"
                    @click="toggle(img.id)"
                    class="absolute -top-1.5 -right-1.5 hidden group-hover:flex w-5 h-5 bg-red-500 text-white rounded-full items-center justify-center text-xs leading-none shadow"
                    title="Rimuovi"
                >
                    &times;
                </button>
            </div>
        </template>
    </div>

    {{-- Bottone per aprire la galleria --}}
    <button
        type="button"
        @click="open = true"
        class="inline-flex items-center gap-x-1.5 px-4 py-2 text-sm font-medium text-white rounded-lg transition"
        style="background-color: var(--color-primary-600, #d97706);"
        onmouseover="this.style.opacity='0.85'"
        onmouseout="this.style.opacity='1'"
    >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5M4.5 3h15A1.5 1.5 0 0121 4.5v15a1.5 1.5 0 01-1.5 1.5h-15A1.5 1.5 0 013 19.5v-15A1.5 1.5 0 014.5 3z" />
        </svg>
        Seleziona dalla galleria
    </button>

    {{-- Modale --}}
    <div
        x-show="open"
        x-cloak
        class="fixed inset-0 z-[200] flex items-center justify-center"
        style="background: rgba(0,0,0,0.6);"
        @click.self="cancel()"
        @keydown.escape.window="cancel()"
    >
        <div
            class="bg-white dark:bg-gray-900 rounded-2xl shadow-2xl w-full max-w-4xl mx-4 flex flex-col"
            style="max-height: 85vh;"
            @click.stop
        >
            {{-- Header --}}
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex-shrink-0">
                <h3 class="text-base font-semibold text-gray-900 dark:text-white">Galleria immagini</h3>
                <button type="button" @click="cancel()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- Griglia immagini --}}
            <div class="flex-1 overflow-y-auto p-6">
                <template x-if="images.length === 0">
                    <p class="text-center text-gray-400 py-12">
                        Nessuna immagine in galleria.<br>
                        <span class="text-sm">Prima carica le immagini nella sezione <strong>Galleria</strong>.</span>
                    </p>
                </template>

                <div class="grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-5 gap-3">
                    <template x-for="img in images" :key="img.id">
                        <div
                            @click="toggle(img.id)"
                            class="relative cursor-pointer rounded-xl overflow-hidden transition-all"
                            style="aspect-ratio: 1/1;"
                            :class="isSelected(img.id)
                                ? 'ring-2 ring-offset-2 ring-amber-500'
                                : 'ring-1 ring-gray-200 hover:ring-gray-400'"
                        >
                            <img :src="img.url" :alt="img.nome" class="w-full h-full object-cover">

                            {{-- Badge selezione --}}
                            <div
                                x-show="isSelected(img.id)"
                                class="absolute top-1.5 right-1.5 w-6 h-6 rounded-full flex items-center justify-center shadow"
                                style="background-color: #d97706;"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                                </svg>
                            </div>

                            {{-- Nome overlay --}}
                            <div
                                x-show="img.nome"
                                class="absolute bottom-0 left-0 right-0 text-white text-xs px-2 py-1 truncate"
                                style="background: rgba(0,0,0,0.5);"
                                x-text="img.nome"
                            ></div>
                        </div>
                    </template>
                </div>
            </div>

            {{-- Footer --}}
            <div class="flex items-center justify-between px-6 py-4 border-t border-gray-200 dark:border-gray-700 flex-shrink-0">
                <span class="text-sm text-gray-500 dark:text-gray-400">
                    <span x-text="selected.length"></span> selezionate
                </span>
                <div class="flex gap-3">
                    <button
                        type="button"
                        @click="cancel()"
                        class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 transition"
                    >
                        Annulla
                    </button>
                    <button
                        type="button"
                        @click="confirm()"
                        class="px-4 py-2 text-sm font-medium text-white rounded-lg transition"
                        style="background-color: #d97706;"
                        onmouseover="this.style.opacity='0.85'"
                        onmouseout="this.style.opacity='1'"
                    >
                        Conferma selezione
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
