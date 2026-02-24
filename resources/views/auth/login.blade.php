<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login</title>
</head>
<body class="bg-gray-900 text-gray-300">
    @if (session('error'))
        <div class="p-2">
            <div class="p-4 mb-4 text-sm rounded bg-green-200 text-gray-900" role="alert">
                <span class="font-bold">Success:</span> {{ session('error') }}
            </div>
        </div>
    @endif
    <form method="post">
        @csrf
        <div class="gap-2 flex flex-col mx-auto p-2">
            <div class="flex flex-col">
                <label for="email">Email</label>
                <input value="{{old('email')}}" id="email" type="email" name="email" required class="bg-gray-700 px-2 py-1 outline-hidden focus:ring-1 focus:ring-yellow-200" placeholder="mohamed@gmail.com">
                @error('email')
                <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required class="bg-gray-700 px-2 py-1 outline-hidden focus:ring-1 focus:ring-yellow-200" placeholder="secret">
                @error('password')
                <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            {{-- <div class="flex gap-2 items-center">
                <p>forgot password?</p><a class="text-small text-gray-400 underline active:text-blue-700" href="{{route('auth.login')}}">reset now</a>
            </div> --}}
            <div class="mt-4">
                <input type="submit" value="Login" class="w-full py-1 px-2 bg-linear-to-r from-orange-600 via-orange-500 to-orange-400 text-white cursor-pointer">
            </div>
        </div>

    </form>
</body>
</html>