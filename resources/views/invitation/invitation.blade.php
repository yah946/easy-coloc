<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css'])
    <title>Invitation</title>
</head>

<body class="bg-gray-900 text-gray-300 min-h-screen p-2 md:ml-16 mb-10">
    <div class="bg-gray-900 h-screen flex items-center justify-center">
        <div
            class="tilt-card w-80 h-96 bg-gradient-to-br from-purple-700 to-pink-500 rounded-2xl shadow-2xl relative transition-all duration-300 ease-out md:hover:scale-105">
            <div class="glow opacity-0 transition-opacity duration-300"></div>
            <div class="tilt-card-content p-6 flex flex-col h-full justify-between relative z-10">
                <div>
                    <h2 class="text-3xl font-bold text-white mb-2">Invitation</h2>
                    <p class="text-gray-200">You are invited to join {{ $invitation }}</p>
                </div>
                <div class="space-y-4">
                    <button
                        class="w-full cursor-pointer py-2 bg-white text-purple-700 rounded-lg font-semibold transform transition hover:scale-105 active:scale-95">
                        Accept
                    </button>
                    <button
                        class="w-full cursor-pointer py-2 bg-white text-red-600 rounded-lg font-semibold transform transition hover:scale-105 active:scale-95">
                        Decline
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
