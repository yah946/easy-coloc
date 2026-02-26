<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/modal.js'])
    <title>Colocation</title>
</head>

<body class="bg-gray-900 text-gray-300 min-h-screen p-2 md:ml-16 mb-10">
    {{-- invite --}}
    <div class="relative flex flex-col justify-center items-center my-6 bg-white border rounded-lg p-2">
        <div class="p-3 space-y-6 text-slate-800">
            <div class="flex justify-center">
                <h5 class="text-2xl font-semibold">
                    Invite Members
                </h5>
            </div>
            <form action="{{ route('invitation') }}" method="post" class="space-y-6">
                @csrf
                <div class="flex flex-col ">
                    <label for="email">Email</label>
                    <input class="border-b outline-hidden px-2 focus:border py-1" id="email" name="email"
                        type="text" placeholder="e.g. mohamed14@gmail.com">
                    @error('email')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="text-center">
                    <button
                        class="min-w-32 rounded-md bg-slate-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none cursor-pointer"
                        type="submit">
                        Invite
                    </button>
                </div>
            </form>
        </div>
    </div>
    {{-- end invite --}}
    {{-- Categories --}}
    <div
        class="relative w-full flex flex-col justify-center items-center my-6 bg-white shadow-sm border border-slate-200 rounded-lg p-2">
        <div class="p-3">
            <div class="flex justify-center mb-2 text-center">
                <h5 class="text-slate-800 text-2xl font-semibold">
                    Categories
                </h5>
            </div>
            @livewire('category-list')
            <div class="text-center mt-4">
                <button id="show-modal"
                    class="cursor-pointer min-w-32 rounded-md bg-slate-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none"
                    type="button">
                    New Category
                </button>
            </div>
            @livewire('category-modal')
        </div>
    </div>
    {{-- end Categories --}}
    <x-tab-bar></x-tab-bar>
</body>

</html>
