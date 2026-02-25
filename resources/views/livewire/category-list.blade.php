<div>
    @forelse($categories as $category)
        <article class="flex justify-between gap-6">
            {{-- <p class="text-slate-600 leading-normal font-light mb-2 max-w-lg">{{ Str::limit($category->name,10) }}</p> --}}
            <input wire:model.defer="names.{{ $category->id }}" class="text-slate-600 leading-normal w-22 font-light mb-2 max-w-lg">
            <div class="flex gap-1">
                <div wire:click="update({{ $category }})"><button class="cursor-pointer active:text-white rounded px-2 bg-blue-700">update</button></div>
                <div wire:click="delete({{ $category }})"><button class="cursor-pointer active:text-white rounded px-2 bg-red-400 text-black">delete</button></div>
            </div>
        </article>
    @empty
        <p class="block text-slate-600 leading-normal font-light mb-4 max-w-lg">
            No Categories Yet.
        </p>
    @endforelse
    {{ $categories->links() }}
</div>
