@extends('layouts.app')

@section('content')
    <div class="flex items-end justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold">Tutorial</h1>
            <p class="mt-2 text-gray-400">Pilih materi dan mulai belajar.</p>
        </div>
    </div>

    <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($tutorials as $tutorial)
            <a href="#" class="group block overflow-hidden rounded-2xl border border-gray-800 bg-gray-900 hover:border-cyan-500/60 transition">
                <div class="aspect-[16/9] bg-gray-800">
                    @if ($tutorial->thumbnail)
                        <img
                            src="{{ $tutorial->thumbnail }}"
                            alt="{{ $tutorial->title }}"
                            class="h-full w-full object-cover opacity-90 group-hover:opacity-100 transition"
                            loading="lazy"
                        />
                    @endif
                </div>

                <div class="p-5">
                    <div class="flex items-center justify-between gap-3">
                        <span class="inline-flex items-center rounded-full border border-gray-700 bg-gray-950 px-3 py-1 text-xs font-semibold text-cyan-300">
                            {{ $tutorial->category }}
                        </span>
                        <span class="text-xs text-gray-500">
                            {{ $tutorial->created_at?->format('d M Y') }}
                        </span>
                    </div>

                    <h2 class="mt-4 text-lg font-bold text-white group-hover:text-cyan-300 transition">
                        {{ $tutorial->title }}
                    </h2>

                    <p class="mt-2 text-sm text-gray-400 line-clamp-2">
                        {{ str($tutorial->content)->stripTags()->limit(120) }}
                    </p>
                </div>
            </a>
        @empty
            <div class="rounded-2xl border border-gray-800 bg-gray-900 p-8 sm:col-span-2 lg:col-span-3">
                <p class="text-gray-300 font-semibold">Belum ada tutorial.</p>
                <p class="mt-2 text-gray-500 text-sm">Nanti kalau sudah ada data di tabel `tutorials`, daftar akan muncul di sini.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-10">
        {{ $tutorials->links() }}
    </div>
@endsection

