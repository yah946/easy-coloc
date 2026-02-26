<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/modal.js'])
    <title>Users</title>
</head>

<body class="bg-gray-900 text-gray-300 p-2 flex flex-col space-y-2 md:ml-16 mb-10">
    <h1 class="text-2xl font-bold mt-2">All Users</h1>
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
    <table class="text-center border-collapse border border-gray-400">
        <thead>
            <tr>
                <th class="text-black h-10 bg-gray-400">name</th>
                <th class="text-black h-10 bg-gray-400">reputation</th>
                <th class="text-black h-10 bg-gray-400 hidden md:table-cell">Email</th>
                <th class="text-black h-10 bg-gray-400 hidden md:table-cell">Join at</th>
                <th class="text-black h-10 bg-gray-400">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="bg-gray-600 border-b h-10">{{ $user->name }}</td>
                    <td class="bg-gray-600 border-b h-10">{{ $user->reputation }}</td>
                    <td class="bg-gray-600 border-b h-10 hidden md:table-cell">{{ $user->email }}</td>
                    <td class="bg-gray-600 border-b h-10 hidden md:table-cell">{{ $user->created_at }}</td>
                    <td class="bg-gray-600 border-b h-10">
                        <form action="{{ route('admin.ban', $user) }}" method="post">
                            @csrf
                            @method('delete')
                            <div class="flex justify-center">
                                <button class="bg-red-600 rounded px-2 cursor-pointer active:text-black"
                                    type="submit">block</button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
    <x-tab-bar></x-tab-bar>
</body>

</html>
