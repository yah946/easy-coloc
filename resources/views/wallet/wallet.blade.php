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
      <div class=" divide-slate-200">
        @foreach ($expenses as $expense)
          <div class="flex flex-col items-center justify-between pb-3 pt-3 last:pb-0">
            <div class="w-full flex flex-col gap-8">
              <div class="flex items-center gap-x-3">
                <p
                  class="bg-orange-500 text-center text-black font-bold py-1 relative inline-block h-8 w-8 rounded-full object-cover object-center">
                  {{ Str::replace('...', '', Str::upper(Str::limit($expense->payer->name, 1))) }}
                </p>
                <div>
                  <div class="flex flex-col gap-0">
                    <h6 class="text-slate-800 font-semibold">
                      {{ $expense->title }}
                    </h6>
                    <p class="text-slate-600 text-sm">Bought by:
                      <strong>{{ $expense->payer->name }}</strong>
                    </p>
                    <span class="text-green-700 text-sm">Total: {{ $expense->amount }} Dh</span>
                  </div>
                </div>
              </div>
              @foreach ($expense->users as $user)
                <div class="flex justify-between items-center text-slate-600">
                  <div>
                    <strong>{{ $user->name }}</strong> owes <span class="text-green-700 text-sm">{{ $user->pivot->amount }}
                      Dh</span>
                  </div>
                  @if ($user->pivot->paid_at)
                    <span class="text-green-700 text-sm">Paid</span>
                  @else
                    @if(auth()->id() == $user->id)
                      <form action="{{ route('expense.pay', [$expense, $user->id]) }}" method="post"
                        class="text-slate-600 font-medium">
                        @csrf
                        <button type="submit"
                          class="p-2 cursor-pointer rounded-lg bg-green-600 hover:bg-linear-65 hover:from-purple-500 hover:to-yellow-500 transition">
                          <svg class="w-5 h-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.917,0.875c-5.086,0-9.208,4.123-9.208,9.208c0,5.086,4.123,9.208,9.208,9.208s9.208-4.122,9.208-9.208
                                      C19.125,4.998,15.003,0.875,9.917,0.875z M9.917,18.141c-4.451,0-8.058-3.607-8.058-8.058s3.607-8.057,8.058-8.057
                                      c4.449,0,8.057,3.607,8.057,8.057S14.366,18.141,9.917,18.141z M13.851,6.794l-5.373,5.372L5.984,9.672
                                      c-0.219-0.219-0.575-0.219-0.795,0c-0.219,0.22-0.219,0.575,0,0.794l2.823,2.823c0.02,0.028,0.031,0.059,0.055,0.083
                                      c0.113,0.113,0.263,0.166,0.411,0.162c0.148,0.004,0.298-0.049,0.411-0.162c0.024-0.024,0.036-0.055,0.055-0.083l5.701-5.7
                                      c0.219-0.219,0.219-0.575,0-0.794C14.425,6.575,14.069,6.575,13.851,6.794z"
                              data--h-bstatus="0OBSERVED">
                            </path>
                          </svg>
                        </button>
                      </form>
                    @else
                      <span class="text-red-700 text-sm">Not Paid</span>
                    @endif
                  @endif
                </div>
              @endforeach
              <hr class="text-slate-600 my-2">
            </div>
        @endforeach
        </div>
      </div>
    </div>
    <x-tab-bar></x-tab-bar>


</body>

</html>