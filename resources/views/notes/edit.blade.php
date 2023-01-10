@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2>Edit Note</h2>
                <form action="{{ route('notes.update', $note) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" value="{{ @old('title', $note->title) }}" name="title" placeholder="Title..."
                        autocomplete="off" class="w-full mb-3 outline-none" required>
                    @error('title')
                        <div class="text-red-300 text-sm">{{ $message }}
                        </div>
                    @enderror
                    <textarea name="text" rows="10" placeholder="Text..." class="mb-3 w-full outline-none md:tracking-wide"
                        required>{{ @old('text', $note->text) }}</textarea>
                    @error('text')
                        <div class="text-red-300 text-sm">{{ $message }}
                        </div>
                    @enderror
                    <button type="submit" class="mt-6 rounded-md bg-blue-900 p-2">Update note</button>
                </form>

            </div>
        </div>
    </div>
@endsection
