@extends('layouts.app')

@section('content')

<div class="grid md:grid-cols-2 gap-10 items-center">

    <div>
        <h1 class="text-5xl font-bold leading-tight">
            Platform Tutorial Coding Modern
        </h1>

        <p class="mt-6 text-gray-400 text-lg">
            Belajar Laravel, PHP, JavaScript, Tailwind CSS,
            dan ujicoba coding langsung di browser.
        </p>

        <div class="mt-8 flex gap-4">

            <a href="/tutorial"
               class="bg-cyan-500 hover:bg-cyan-600 px-6 py-3 rounded-xl font-semibold">
                Mulai Belajar
            </a>

            <a href="/codalab"
               class="border border-gray-700 hover:border-cyan-400 px-6 py-3 rounded-xl">
                Buka CodaLab
            </a>

        </div>
    </div>

    <div class="bg-gray-900 rounded-3xl p-8 border border-gray-800">

        <h2 class="text-2xl font-bold mb-6">
            Kategori Tutorial
        </h2>

        <div class="grid grid-cols-2 gap-4">

            <div class="bg-gray-800 p-4 rounded-2xl">
                Laravel
            </div>

            <div class="bg-gray-800 p-4 rounded-2xl">
                PHP
            </div>

            <div class="bg-gray-800 p-4 rounded-2xl">
                JavaScript
            </div>

            <div class="bg-gray-800 p-4 rounded-2xl">
                Tailwind CSS
            </div>

        </div>

    </div>

</div>

@endsection
