<div>
    <div class="space-y-4">
        @forelse ($expenses as $expense)
            <div class="flex items-center justify-between px-5 py-4 rounded-xl border border-gray-600 transition mt-8">
                <div class="flex flex-col">
                    <span class="text-white text-lg font-medium md:hidden">{{ Str::limit($expense->title,20) }}</span>
                    <span class="text-white text-lg font-medium hidden md:flex">{{ $expense->title }}</span>
                    <span class="text-gray-300 text-md font-medium">{{ $expense->payer->name }}</span>
                    <span class="text-green-400 text-sm">{{ $expense->amount }} Dh</span>
                </div>
                <div class="flex items-center gap-4">
                    <form action="{{ route('expense.edit', $expense) }}" method="post">
                        @csrf
                        <button type="submit" class="p-2 rounded-lg bg-blue-600 hover:bg-blue-500 transition">
                            <svg class="w-5 h-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M19.404,6.65l-5.998-5.996c-0.292-0.292-0.765-0.292-1.056,0l-2.22,2.22l-8.311,8.313l-0.003,0.001v0.003l-0.161,0.161c-0.114,0.112-0.187,0.258-0.21,0.417l-1.059,7.051c-0.035,0.233,0.044,0.47,0.21,0.639c0.143,0.14,0.333,0.219,0.528,0.219c0.038,0,0.073-0.003,0.111-0.009l7.054-1.055c0.158-0.025,0.306-0.098,0.417-0.211l8.478-8.476l2.22-2.22C19.695,7.414,19.695,6.941,19.404,6.65z"/>
                            </svg>
                        </button>
                    </form>

                    <form action="{{ route('expense.delete', $expense) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="p-2 rounded-lg bg-red-600 hover:bg-red-500 transition">
                            <svg class="w-5 h-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M16.588,3.411h-4.466c0.042-0.116,0.074-0.236,0.074-0.366c0-0.606-0.492-1.098-1.099-1.098H8.901c-0.607,0-1.098,0.492-1.098,1.098c0,0.13,0.033,0.25,0.074,0.366H3.41c-0.606,0-1.098,0.492-1.098,1.098c0,0.607,0.492,1.098,1.098,1.098h0.366V16.59c0,0.808,0.655,1.464,1.464,1.464h9.517c0.809,0,1.466-0.656,1.466-1.464V5.607h0.364c0.607,0,1.1-0.491,1.1-1.098C17.688,3.903,17.195,3.411,16.588,3.411z"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="text-center py-10">
                <p class="text-gray-300 text-lg font-medium">
                    No Expenses Yet.
                </p>
            </div>
        @endforelse
    </div>
    {{ $expenses->links('pagination::tailwind') }}
</div>
