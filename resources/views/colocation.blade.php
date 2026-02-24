<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/modal.js'])
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
            <h2 class="m-0">{{ auth()->user()->name }}</h2>
            <p>{{ auth()->user()->email }}</p>
            <a class="bg-red-600 rounded w-fit py-1 px-2 cursor-pointer" href="{{ route('logout') }}">Logout</a>
        </div>
    </main>
    <div id="show-modal"
        class="w-6 h-6 bg-red-600 rounded flex justify-center cursor-pointer hover:scale-120 duration-150 active:text-black fixed bottom-3 right-3">
        <span>&#x2b;</span>
    </div>
    {{-- Modal --}}
    <div id="modal" class="text-white hidden flex fixed inset-0 items-center justify-center z-50">
        <div id="overlay" class="fixed inset-0 bg-white opacity-20"></div>
        <div class="bg-black space-y-4 p-4 rounded-lg shadow-lg z-10 relative max-w-sm w-full mx-4">
            {{-- header --}}
            <div class="flex justify-between items-center">
                <h2>Create New Colocation</h2>
                <span id="xmark" class="cursor-pointer">&#10006;</span>
            </div>
            {{-- body --}}
            <div>
                <form>
                    <input type="text" id="date_range" wire:model="date_range" placeholder="Select date range">
                    <div class="flex justify-between">
                        <button id="cancel">Cancel</button>
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
