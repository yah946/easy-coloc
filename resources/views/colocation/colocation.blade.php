<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/modal.js'])
    <title>Colocations</title>
</head>

<body class="bg-gray-900 text-gray-300 p-2 space-y-6 md:ml-16 mb-10">
    <h1 class="text-2xl font-bold mt-2">Colocations</h1>
    <main>
        @if (session('success'))
            <div class="p-2">
                <div class="p-4 mb-4 text-sm rounded bg-green-200 text-gray-900" role="alert">
                    <span class="font-bold">Success:</span> {{ session('success') }}
                </div>
            </div>
        @endif
        @if (session('error') || session()->has('error'))
            <div class="p-2">
                <div class="p-4 mb-4 text-sm rounded bg-red-300 text-gray-900" role="alert">
                    <span class="font-bold">Error:</span> {{ session('error') }}
                </div>
            </div>
        @endif
    </main>
    <div id="show-modal"
        class="w-6 h-6 bg-red-600 rounded flex justify-center cursor-pointer hover:scale-120 duration-150 active:text-black fixed bottom-6 right-3 z-50">
        <span>&#x2b;</span>
    </div>
    {{-- Modal --}}
    @livewire('modal')
    @livewire('display-colocation')
</body>
<x-tab-bar></x-tab-bar>

</html>
