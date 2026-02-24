<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Profile</title>
</head>
<body class="bg-gray-900 text-gray-300 p-2 space-y-6">
    <main>
        @if (session('success'))
        <div class="p-2">
            <div class="p-4 mb-4 text-sm rounded bg-green-200 text-gray-900" role="alert">
                <span class="font-bold">Success:</span> {{ session('success') }}
            </div>
        </div>
        @endif
        @if (session('error'))
        <div class="p-2">
            <div class="p-4 mb-4 text-sm rounded bg-red-300 text-gray-900" role="alert">
                <span class="font-bold">Error:</span> {{ session('error') }}
            </div>
        </div>
        @endif
        <div class="border p-2 space-y-2">
            <h2 class="m-0">{{ auth()->user()->name}}</h2>
            <p>{{ auth()->user()->email}}</p>
            <a class="bg-red-600 rounded w-fit py-1 px-2 cursor-pointer" href="route('auth.logout')">Logout</a>
        </div>
    </main>
    <nav class="flex flex-col">
        <p class="cursor-pointer hover:bg-black hover:text-white py-1 px-2" id="nav-edit_profile">Edit Profile</p>
        <p class="cursor-pointer hover:bg-black hover:text-white py-1 px-2" id="nav-change_password">Change Password</p>
    </nav>
    <section id="edit_profile" class="hidden">
        <form method="post" class="flex flex-col gap-4">
            @csrf
            @method('put')
            <div>
                <input value="{{ auth()->user()->name }}" name="name" class="outline-hidden focus:ring-1 focus:border-none focus:ring-yellow-200 border w-full h-8 pl-4 pr-12" type="text" placeholder="Change Name">
                @error('name')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <input value="{{ auth()->user()->email }}" name="email" class="outline-hidden focus:ring-1 focus:border-none focus:ring-yellow-200 border w-full h-8 pl-4 pr-12" type="text" placeholder="New Email">
                @error('email')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <input type="submit" value="Update" class="w-full py-1 px-2 bg-linear-to-r from-orange-600 via-orange-500 to-orange-400 text-white cursor-pointer">
            </div>
        </form>
    </section>
    <section id="change_password" class="hidden">
        <form method="post" class="flex flex-col gap-4">
            @csrf
            @method('patch')
            <div class="max-w-md relative">
                <input name="current_password" class="outline-hidden focus:border-none focus:ring-1 focus:ring-yellow-200 password-input border w-full h-8 pl-4 pr-12" type="password" placeholder="Current Password">
                <button class="toggle-password absolute right-3 top-1/2 -translate-y-1/2">
                    <svg class="show-pass cursor-pointer w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                       width="24" height="24" fill="none" viewBox="0 0 24 24">
                       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M3 6.2V5h11v1.2M8 5v14m-3 0h6m2-6.8V11h8v1.2M17 11v8m-1.5 0h3" />
                   </svg>
                   <svg class="hide-pass cursor-pointer hidden absolute right-0 top-1/2 -translate-y-1/2 w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                       width="24" height="24" fill="none" viewBox="0 0 24 24">
                       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M7 6.2V5h12v1.2M7 19h6m.2-14-1.677 6.523M9.6 19l1.029-4M5 5l6.523 6.523M19 19l-7.477-7.477" />
                   </svg>
                </button>
                
                
            </div>
            <div>
                @error('current_password')
                <span class="text-sm text-red-500">$message </span>
                @enderror
            </div>
            <div class="max-w-md relative">
                <input name="password" class="outline-hidden focus:border-none focus:ring-1 focus:ring-yellow-200 password-input border w-full h-8 pl-4 pr-12" type="password" placeholder="New Password">
                <button class="toggle-password absolute right-3 top-1/2 -translate-y-1/2">
                    <svg class="show-pass cursor-pointer w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                       width="24" height="24" fill="none" viewBox="0 0 24 24">
                       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M3 6.2V5h11v1.2M8 5v14m-3 0h6m2-6.8V11h8v1.2M17 11v8m-1.5 0h3" />
                   </svg>
                   <svg class="hide-pass cursor-pointer hidden absolute right-0 top-1/2 -translate-y-1/2 w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                       width="24" height="24" fill="none" viewBox="0 0 24 24">
                       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M7 6.2V5h12v1.2M7 19h6m.2-14-1.677 6.523M9.6 19l1.029-4M5 5l6.523 6.523M19 19l-7.477-7.477" />
                   </svg>
                </button>
            </div>
            <div>
                @error('password')
                <span class="text-sm text-red-500">$message </span>
                @enderror
            </div>
            <div class="max-w-md relative">
                <input name="password_confirmation" class="outline-hidden focus:border-none focus:ring-1 focus:ring-yellow-200 password-input border w-full h-8 pl-4 pr-12" type="password" placeholder="Confirm New Password">
                <button class="toggle-password absolute right-3 top-1/2 -translate-y-1/2">
                    <svg class="show-pass cursor-pointer w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                       width="24" height="24" fill="none" viewBox="0 0 24 24">
                       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M3 6.2V5h11v1.2M8 5v14m-3 0h6m2-6.8V11h8v1.2M17 11v8m-1.5 0h3" />
                   </svg>
                   <svg class="hide-pass cursor-pointer hidden absolute right-0 top-1/2 -translate-y-1/2 w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                       width="24" height="24" fill="none" viewBox="0 0 24 24">
                       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M7 6.2V5h12v1.2M7 19h6m.2-14-1.677 6.523M9.6 19l1.029-4M5 5l6.523 6.523M19 19l-7.477-7.477" />
                   </svg>
                </button>
            </div>
            <div class="mt-4">
                <input type="submit" value="Update" class="w-full py-1 px-2 bg-linear-to-r from-orange-600 via-orange-500 to-orange-400 text-white cursor-pointer">
            </div>
        </form>
    </section>
</body>
</html>