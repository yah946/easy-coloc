<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/modal.js'])
    <title>Expenses</title>
</head>
<body class="bg-gray-900 text-gray-300 p-2 md:ml-16 mb-10">
    <a 
    class="rounded py-1 px-2 bg-linear-to-r from-orange-600 via-orange-500 to-orange-400 text-white"
    href="{{ route('expense.create') }}">New expense</a>
    @livewire('expense-pagination')
    <x-tab-bar></x-tab-bar>
</body>
</html>