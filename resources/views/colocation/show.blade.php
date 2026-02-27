<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/modal.js'])
    <title>{{ $colocation->name }}</title>
</head>

<body class="bg-gray-900 text-gray-300 min-h-screen p-2 md:ml-16 mb-10">
    <h1 class="text-2xl font-bold mt-2 mb-4">Colocations: {{ $colocation->name }}</h1>
    <div class="mb-2 flex md:justify-end">
        @role('admin')
            <button type="button"
                class="cursor-pointer rounded text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br font-medium rounded-base text-sm px-4 py-2.5 text-center leading-5 active:text-black">Cancel Colocation</button>
        @endrole
        @role('user')
            <button
                class="cursor-pointer relative inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-heading rounded-base group bg-gradient-to-br from-red-200 via-red-300 to-yellow-200 group-hover:from-red-200 group-hover:via-red-300 group-hover:to-yellow-200 active:text-black">
                <span
                    class=" relative px-4 py-2.5 transition-all ease-in duration-75 bg-neutral-primary-soft rounded-base group-hover:bg-transparent leading-5">
                    Red to Yellow
                </span>
            </button>
        @endrole
    </div>
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
    {{-- members --}}
    <div class="relative flex flex-col bg-white shadow-sm border border-slate-200 rounded-lg">
  <div class="p-4">
    <div class="mb-4 flex items-center justify-between">
      <h5 class="text-slate-800 text-lg font-semibold">
        Roomated
      </h5>
      <p
        href="#"
        class="text-slate-600"
      >
        3 members
      </p>
    </div>
    <div class="divide-y divide-slate-200">
      <div class="flex items-center justify-between pb-3 pt-3 last:pb-0">
        <div class="flex items-center gap-x-3">
          <p
            src="https://demos.creative-tim.com/test/corporate-ui-dashboard/assets/img/team-1.jpg"
            alt="Maria Jimenez"
            class="bg-orange-500 text-center text-black font-bold py-1 relative inline-block h-8 w-8 rounded-full object-cover object-center"
          >M</p>
          <div>
            <h6 class="text-slate-800 font-semibold">
              Maria Jimenez
            </h6>
            <p class="text-slate-600 text-sm">
              maria@gmail.com
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="md:flex gap-3">
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
            @livewire('category-list', ['colocation' => $colocation])
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
</div>
    <x-tab-bar></x-tab-bar>
</body>

</html>
