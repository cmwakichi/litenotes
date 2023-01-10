@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">

            @if (session('message'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4"
                    role="alert">
                    {{ session('message') }}
                </div>
            @endif

            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    Notes
                </header>
            </section>
            <div class="w-full mt-3 bg-gray-100 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                <h2 class="text-2xl">
                    {{ $note->title }}
                </h2>
                <p class="text-gray-700 text-sm mt-2 whitespace-pre-wrap">{{ $note->text }}</p>
            </div>

        </div>
    </main>
@endsection
