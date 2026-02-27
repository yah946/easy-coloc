<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Update Expense</title>
</head>

<body class="bg-gray-900 text-gray-300">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="p-2">
                <div class="p-4 mb-2 text-sm rounded bg-red-300 text-gray-900" role="alert">
                    <span class="font-bold">Error:</span> {{ $error }}
                </div>
            </div>
        @endforeach
    @endif
    <form action="{{ route('expense.update') }}" method="post">
        @csrf
        @method('patch')
        <div class="gap-2 flex flex-col mx-auto p-2 max-w-md">
        <div class="flex flex-col">
                <label for="title">Title</label>
                <input value="{{ $expense->title }}" id="title" type="title" name="title" required
                    class="bg-gray-700 px-2 py-1 outline-hidden focus:border-none focus:ring-1 focus:ring-yellow-200">
                @error('title')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
        <label for="category">Category</label>
        <select id="category" name="category_id"
            class="bg-gray-700 px-2 py-1 outline-hidden focus:border-none focus:ring-1 focus:ring-yellow-200">
            <option value="" disabled selected>Select category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" value="{{ $category->id }}"
                    {{ old('category_id', $expense->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <p>{{ $message }}</p>
        @enderror
        <div class="flex flex-col">
                <label for="amount">Amount</label>
                <input value="{{ $expense->amount }}" id="amount" type="number" name="amount" required
                    class="bg-gray-700 px-2 py-1 outline-hidden focus:border-none focus:ring-1 focus:ring-yellow-200">
                @error('amount')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
        <div class="mt-4">
                <input type="submit" value="Update"
                    class="w-full py-1 px-2 bg-linear-to-r from-orange-600 via-orange-500 to-orange-400 text-white cursor-pointer">
            </div>
            </div>
    </form>
</body>

</html>
