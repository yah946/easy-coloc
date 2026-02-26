<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/modal.js'])
    <title>Users</title>
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
    </main>
    @foreach ($users as $user)
    <form action="" method="post">
        @csrf
        <div class="flex justify-between">
            <p>{{ $user->name }}</p>
            <p>{{ $user->reputation }}</p>
            <button type="submit">block</button>
        </div>
    </form>
    @endforeach
</body>

</html>
