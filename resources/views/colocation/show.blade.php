<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/modal.js'])
    <title>Colocation</title>
</head>
<body class="bg-gray-900 text-gray-300 p-2 space-y-6">
    <div class="relative min-h-80 flex flex-col justify-center items-center my-6 bg-white border rounded-lg p-2">
  <div class="p-3 text-center">
    <div class="flex justify-center mb-4">
    </div>
    <div class="flex justify-center mb-2">
      <h5 class="text-slate-800 text-2xl font-semibold">
        Lit Ideas for Startups
      </h5>
    </div>
    <p class="block text-slate-600 leading-normal font-light mb-4 max-w-lg">
      Because it&apos;s about motivating the doers. Because I&apos;m here to follow my dreams and inspire others.
    </p>
    <div class="text-center">
      <button class="min-w-32 rounded-md bg-slate-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none" type="button">
        Invite
      </button>
    </div>
  </div>
</div>
<div class="relative w-full flex flex-col justify-center items-center my-6 bg-white shadow-sm border border-slate-200 rounded-lg p-2">
  <div class="p-3 text-center">
    <div class="flex justify-center mb-4">
    </div>
    <div class="flex justify-center mb-2">
      <h5 class="text-slate-800 text-2xl font-semibold">
        Categories
      </h5>
    </div>
    @forelse($categories as $category)
    <select name="" id="">
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    </select>
    @empty
    <p class="block text-slate-600 leading-normal font-light mb-4 max-w-lg">
      No Categories Yet.
    </p>
    @endforelse
    <div class="text-center">
      <button class="cursor-pointer min-w-32 rounded-md bg-slate-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none" type="button">
        New Category
      </button>
    </div>
  </div>
</div>
</body>
</html>