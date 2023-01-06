@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="/notes" method="POST">
                    @csrf
                    <input type="text" name="title" placeholder="Title..." autocomplete="off"
                        class="w-full mb-3 outline-none" required>
                    <textarea name="text" rows="10" placeholder="Text..." class="mb-3 w-full outline-none md:tracking-wide"
                        required></textarea>
                    <button type="submit" class="mt-6 rounded-md bg-blue-900 p-2">Save note</button>
                </form>
                <div>
                    @if ($errors->any())
                        <ul class="list-decimal">
                            @foreach ($errors->all() as $error)
                                <div>
                                    <li class="text-red-300 text-sm">{{ $error }}</li>
                                </div>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
