<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/modal.js'])
    <title>{{$colocation->name}}</title>
</head>

<body class="bg-gray-900 text-gray-300 min-h-screen p-2 md:ml-16 mb-10">
    <h1 class="text-2xl font-bold mt-2 mb-4">Colocations: {{$colocation->name}}</h1>
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
    </main>
    {{-- expenses --}}
    <div class="bg-white rounded-xl shadow-2xl max-w-md w-full overflow-hidden transition-all duration-300 hover:shadow-3xl animate-fade-in">
        <div class="p-6">
            <h2 class="text-2xl font-bold text-black">Expenses</h2>
            <div class="space-y-4">
                <div class="flex items-center space-x-4 p-3 bg-indigo-50 dark:bg-gray-700 rounded-lg transition-all duration-300 hover:bg-indigo-100 dark:hover:bg-gray-600">
                    <div>
                        <h3 class="text-lg font-semibold text-indigo-800 dark:text-white">facture wifi</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300">category</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-6 py-4 bg-indigo-100 dark:bg-gray-700 flex justify-between items-center">
            <span class="text-sm text-indigo-800 dark:text-gray-300">3 team members</span>
            <button class="bg-indigo-800 text-white px-4 py-2 rounded-lg hover:bg-blue-900 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-800 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                New Expense
            </button>
        </div>
    </div>
    {{-- invite --}}
    <div class="relative max-w-md w-full flex flex-col justify-center items-center my-6 bg-white border rounded-lg p-2">
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
        class="relative max-w-md w-full flex flex-col justify-center items-center my-6 bg-white shadow-sm border border-slate-200 rounded-lg p-2">
        <div class="p-3">
            <div class="flex justify-center mb-2 text-center">
                <h5 class="text-slate-800 text-2xl font-semibold">
                    Categories
                </h5>
            </div>
            @livewire('category-list',['colocation'=>$colocation])
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
