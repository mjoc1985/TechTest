<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">


</head>
<body class="antialiased bg-gray-100">
<div class="container max-w-4xl mx-auto bg-white mt-20">
    <form class="space-y-8 divide-y divide-gray-200" method="POST" action="{{ route('coffee.pour') }}">
        {{ csrf_field() }}
        <div class="p-4">
            <h1 class="text-3xl font-semibold mb-2">Coffee App</h1>
            <p>Please choose a coffee</p>

            <div class="py-2">
                @if(count($coffees) < 1)
                    <p>Sorry all coffee out of stock</p>
                @else
                    <select name="coffee" id="coffee" class="p-2 border border-gray-200 rounded">
                        @foreach($coffees as $coffee)
                            <option value="{{ $coffee->id }}">{{ $coffee->name }}</option>
                        @endforeach
                    </select>
                @endif
            </div>
            <div class="mt-10">
                <h2 class="text-2xl font-semibold">Options</h2>
                <p>Would you like to add anything to your coffee?</p>
            </div>
            <div>
                @foreach($options as $option)
                    @if($option->qty > 0)
                        <div class="my-2">
                            <label>{{ $option->name }}</label>
                            <select class="p-2 border border-gray-200 rounded" name="options[{{ $option->id }}]">
                                @for($i = 0;  $i <= $option->qty; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            @error($option->name)
                            <span class="font-semibold text-red-400">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                    @endif
                @endforeach
            </div>
            <button type="submit"
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Make Coffee
            </button>
            @if(session()->has('message'))
                <div>
                    <p class="my-4 font-semibold text-xl">{{ session()->get('message')}}</p>
                </div>
            @endif
            @error('coffee')
                {{ $message }}
            @endif
        </div>
    </form>
</div>
</body>
</html>
