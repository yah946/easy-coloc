<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/modal.js'])
    <title>invites</title>
</head>

<body class="bg-gray-900 text-gray-300 p-2 flex flex-col space-y-2 md:ml-16 mb-10">
    <h1 class="text-2xl font-bold mt-2">All invites</h1>
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
    <div class="relative">
        <svg class="svg-icon h-6 w-6 absolute left-4 top-1/2 -translate-1/2" viewBox="0 0 20 20" data--h-bstatus="0OBSERVED">
            <path fill="white"
                d="M18.125,15.804l-4.038-4.037c0.675-1.079,1.012-2.308,1.01-3.534C15.089,4.62,12.199,1.75,8.584,1.75C4.815,1.75,1.982,4.726,2,8.286c0.021,3.577,2.908,6.549,6.578,6.549c1.241,0,2.417-0.347,3.44-0.985l4.032,4.026c0.167,0.166,0.43,0.166,0.596,0l1.479-1.478C18.292,16.234,18.292,15.968,18.125,15.804 M8.578,13.99c-3.198,0-5.716-2.593-5.733-5.71c-0.017-3.084,2.438-5.686,5.74-5.686c3.197,0,5.625,2.493,5.64,5.624C14.242,11.548,11.621,13.99,8.578,13.99 M16.349,16.981l-3.637-3.635c0.131-0.11,0.721-0.695,0.876-0.884l3.642,3.639L16.349,16.981z"
                data--h-bstatus="0OBSERVED"></path>
        </svg>
        <input type="text" class="w-full rounded bg-gray-700 px-2 py-1 outline-hidden focus:border-none focus:ring-1 focus:ring-yellow-200 pl-8 pr-2" placeholder="Search Members...">

    </div>
    <table class="text-center border-collapse border border-gray-400">
        <thead>
            <tr>
                <th class="text-black h-10 bg-gray-400">Member</th>
                <th class="text-black h-10 bg-gray-400">Status</th>
                <th class="text-black h-10 bg-gray-400">Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- @forelse ($invites as $invite) --}}
            <tr>
                <td class="bg-gray-600 border-b h-10">mohamedkadiri</td>
                <td class="bg-gray-600 border-b h-10">pendig</td>
                <td class="bg-gray-600 border-b h-10 flex items-center justify-center">
                    <a href="">
                        <svg class="svg-icon w-6 h-6" viewBox="0 0 20 20" data--h-bstatus="0OBSERVED">
							<path fill="white" d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" data--h-bstatus="0OBSERVED"></path>
						</svg>
                        <span class="sr-only">dismiss member</span>
                    </a>
                    <a href="">
                        <svg class="svg-icon w-6 h-6" viewBox="0 0 20 20" data--h-bstatus="0OBSERVED">
							<path fill="red" d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z" data--h-bstatus="0OBSERVED"></path>
						</svg>
                        <span class="sr-only">dismiss member</span>
                    </a>
                </td>
            </tr>
            
            {{-- @empty
                <p class="block text-white leading-normal mb-4 max-w-lg">
            No Roommate Yet. Try to Invite One.
        </p>
            @endforelse --}}
        </tbody>
    </table>
    <x-tab-bar></x-tab-bar>
</body>

</html>