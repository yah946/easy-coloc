<div>
    <div id="modal" class="text-white hidden flex fixed inset-0 items-center justify-center z-50">
        <div id="overlay" class="fixed inset-0 bg-white opacity-20"></div>
        <div class="bg-black space-y-4 p-4 rounded-lg shadow-lg z-10 relative max-w-sm w-full mx-4">
            {{-- header --}}
            <div class="flex justify-between items-center">
                <h2>Create New Colocation</h2>
                <span id="xmark" class="cursor-pointer hover:text-red-500">&#10006;</span>
            </div>
            {{-- body --}}
            <div>
                <form wire:submit.prevent="create" method="post" class="space-y-4">
                    <div>
                        <input type="text" id="name" wire:model="name" placeholder="Name Of Colocation"
                            class="rounded w-full bg-gray-700 px-2 py-1 outline-hidden focus:border-none focus:ring-1 focus:ring-yellow-200"
                            required>
                        @error('name')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex justify-between">
                        <button id="cancel" class="cursor-pointer">Cancel</button>
                        <button type="submit" class="cursor-pointer">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script defer>
        const modal = document.getElementById('modal');
        const xmark = document.getElementById('xmark');
        const cancel = document.getElementById('cancel');
        const overlay = document.getElementById('overlay')

        btn.addEventListener('click', function() {
            modal.classList.remove('hidden');
        });
        xmark.addEventListener('click', function() {
            modal.classList.add('hidden');
        });
        cancel.addEventListener('click', function() {
            modal.classList.add('hidden');
        });
        overlay.addEventListener('click', function() {
            modal.classList.add('hidden');
        });
    </script>
</div>
