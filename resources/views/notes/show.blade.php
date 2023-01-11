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
                    {{ $note->trashed() ? 'Trashed' : 'Notes' }}
                </header>
            </section>
            <div class="w-full mt-3 bg-gray-100 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                <div class="flex space-x-4">
                    @if (!$note->trashed())
                        <p class="opacity-70">
                            Created: {{ $note->created_at->diffForHumans() }}
                        </p>
                        <p class="opacity-70">
                            Updated at: {{ $note->updated_at->diffForHumans() }}
                        </p>
                        <a href="{{ route('notes.edit', $note) }}">
                            <span class="hover:underline text-gray-900 hover:text-blue-500">Edit note</span>

                        </a>
                        <form action="{{ route('notes.destroy', $note) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 rounded-md p-2"
                                onclick="confirm('Are you sure you want to delete the note?')">Move note to trash</button>
                        </form>
                    @else
                        <p class="opacity-70">
                            Deleted: {{ $note->deleted_at->diffForHumans() }}
                        </p>
                        <form action="{{ route('trashed.update', $note) }}" method="post">
                            @csrf
                            @method('put')
                            <button type="submit" class="bg-red-600 rounded-md p-2">Restore note</button>
                        </form>

                        <form action="{{ route('trashed.destroy', $note) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 rounded-md p-2"
                                onclick="confirm('Are you sure you want to permanently delete the note?Action cannot be undone.')">Delete
                                permanently</button>
                        </form>
                    @endif
                </div>
                <h2 class="text-2xl">
                    {{ $note->title }}
                </h2>
                <p class="text-gray-700 text-sm mt-2 whitespace-pre-wrap">{{ $note->text }}</p>
            </div>

        </div>
    </main>
@endsection
