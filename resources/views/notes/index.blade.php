@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4"
                    role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    Notes
                </header>
            </section>
            @forelse ($notes as $note)
                <div class="w-full mt-3 bg-gray-100 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    <h2>{{ $note->title }}</h2>
                    <p class="text-gray-700 text-sm mt-2">
                        {{ $note->text }}
                    </p>
                    <span class="text-sm opacity-70 mt-4 block">{{ date('jS M Y', strtotime($note->updated_at)) }}</span>
                </div>
            @empty
                <h2 class="text-5xl">No notes yet.</h2>
            @endforelse


        </div>
    </main>
@endsection
