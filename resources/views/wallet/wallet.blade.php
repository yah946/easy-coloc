    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/modal.js'])
    <title>Wallet</title>
</head>

<body class="bg-gray-900 text-gray-300 min-h-screen p-2 md:ml-16 mb-10">
    <h1 class="text-2xl font-bold mt-2 mb-4">Wallet</h1>

<div class="relative flex flex-col bg-white shadow-sm border border-slate-200 rounded-lg">
  <div class="p-4">
    <div class="mb-4 flex items-center justify-between">
      <h5 class="text-slate-800 text-lg font-semibold">
        Latest Customers
      </h5>
      <a
        href="#"
        class="text-slate-600"
      >
        View all
      </a>
    </div>
    <div class="divide-y divide-slate-200">
      <div class="flex items-center justify-between pb-3 pt-3 last:pb-0">
        <div class="flex items-center gap-x-3">
          <img
            src="https://demos.creative-tim.com/test/corporate-ui-dashboard/assets/img/team-6.jpg"
            alt="John Micheal"
            class="relative inline-block h-8 w-8 rounded-full object-cover object-center"
          />
          <div>
            <h6 class="text-slate-800 font-semibold">
              John Micheal
            </h6>
            <p class="text-slate-600 text-sm">
              john@gmail.com
            </p>
          </div>
        </div>
        <h6 class="text-slate-600 font-medium">
          $420
        </h6>
      </div>
    </div>
  </div>
</div>
    <x-tab-bar></x-tab-bar>
</body>

</html>
