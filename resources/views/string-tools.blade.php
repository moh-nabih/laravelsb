@extends('layouts.app')

@section('title', 'String Tools')


@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">String Operation Tool</h1>

        <form method="POST" action="{{ route('string-tools') }}" class="mb-4">
            @csrf
            <input type="text" name="text_input" placeholder="Enter your text" required class="border p-2 w-full mb-2">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2">Process</button>
        </form>

        @isset($result)
            <h3 class="text-lg font-semibold">Original:</h3>
            <p>{{ $original }}</p>

            <h3 class="text-lg font-semibold mt-4">Processed:</h3>
            <p>{{ $result }}</p>
        @endisset

        @isset($chars)
            <h3 class="text-lg font-semibold mt-4">Original:</h3>
            <p>{{ $original }}</p>

            <h3 class="text-lg font-semibold mt-4">Characters:</h3>
            <ul class="list-disc pl-5">
                @foreach ($chars as $char)
                    <li>{{ $char }}</li>
                @endforeach
            </ul>
            
            <h3 class="text-lg font-semibold mt-4">Is valid:</h3>
            <p>{{ $stack }}</p>
            <p>{{ $isValid }}</p>
        @endisset
    </div>
@endsection
