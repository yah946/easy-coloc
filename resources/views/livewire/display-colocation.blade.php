<div class="space-y-6">
    @foreach ($colocations as $colocation)
    <article class="flex flex-col justify-center border p-2">
            <div class="flex justify-between">
                <p>Owner</p>
                <p class="flex items-center bg-gray-200 text-black px-1 rounded">{{$colocation->status}}</p>
            </div>
            <div class="flex flex-col gap-8">
                <div>
                    <h2 class="m-0 font-bold text-xl">{{$colocation->name}}</h2>
                </div>
                <div id="arrow" class="text-white flex justify-between text-center">
                    <span>2 member</span>
                    <a href="{{route('coloc.show',$colocation)}}" class="bg-gray-200 text-black w-8 h-8 rounded-full text-2xl">&#8594;</a>
                </div>
            </div>
    </article>
    @endforeach
</div>
