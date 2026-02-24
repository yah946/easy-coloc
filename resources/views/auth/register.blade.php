<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Register</title>
</head>
<body class="bg-gray-900 text-gray-300">
    <form method="post">
        @csrf
        <div class="gap-2 flex flex-col mx-auto p-2">
            <div class="flex flex-col">
                <label for="name">Full Name</label>
                <input value="{{old('name')}}" id="name" type="text" name="name" required class="bg-gray-700 px-2 py-1 outline-hidden focus:border-none focus:ring-1 focus:ring-yellow-200" placeholder="Mohamed Mostapha">
                @error('name')
                <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="email">Email</label>
                <input value="{{old('email')}}" id="email" type="email" name="email" required class="bg-gray-700 px-2 py-1 outline-hidden focus:border-none focus:ring-1 focus:ring-yellow-200" placeholder="mohamed@gmail.com">
                @error('email')
                <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required class="bg-gray-700 px-2 py-1 outline-hidden focus:border-none focus:ring-1 focus:ring-yellow-200" placeholder="secret">
                @error('password')
                <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="confirmation">Confirm Password</label>
                <input id="confirmation" type="password" name="password_confirmation" required class="bg-gray-700 px-2 py-1 outline-hidden focus:border-none focus:ring-1 focus:ring-yellow-200" placeholder="secret">
            </div>
            <div class="flex gap-2 items-center">
                <p>Already have an account?</p><a class="text-small text-gray-400 underline active:text-blue-700" href="{{route('auth.login')}}">login</a>
            </div>
            <div class="mt-4">
                <input type="submit" value="Register Now" class="w-full py-1 px-2 bg-linear-to-r from-orange-600 via-orange-500 to-orange-400 text-white cursor-pointer">
            </div>
        </div>

    </form>
</body>
</html>