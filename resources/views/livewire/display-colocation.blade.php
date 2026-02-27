<div class="space-y-6">
    @foreach ($colocations as $colocation)
    <article class="flex flex-col justify-center border p-2">
            <div class="relative flex justify-between">
                @if ($colocation->pivot->role==='owner')
                <div class="flex items-center">
                   <svg class="svg-icon h-6 w-6" viewBox="0 0 20 20" data--h-bstatus="0OBSERVED">
							<path fill="yellow" d="M16.85,7.275l-3.967-0.577l-1.773-3.593c-0.208-0.423-0.639-0.69-1.11-0.69s-0.902,0.267-1.11,0.69L7.116,6.699L3.148,7.275c-0.466,0.068-0.854,0.394-1,0.842c-0.145,0.448-0.023,0.941,0.314,1.27l2.871,2.799l-0.677,3.951c-0.08,0.464,0.112,0.934,0.493,1.211c0.217,0.156,0.472,0.236,0.728,0.236c0.197,0,0.396-0.048,0.577-0.143l3.547-1.864l3.548,1.864c0.18,0.095,0.381,0.143,0.576,0.143c0.256,0,0.512-0.08,0.729-0.236c0.381-0.277,0.572-0.747,0.492-1.211l-0.678-3.951l2.871-2.799c0.338-0.329,0.459-0.821,0.314-1.27C17.705,7.669,17.316,7.343,16.85,7.275z M13.336,11.754l0.787,4.591l-4.124-2.167l-4.124,2.167l0.788-4.591L3.326,8.5l4.612-0.67l2.062-4.177l2.062,4.177l4.613,0.67L13.336,11.754z" data--h-bstatus="0OBSERVED"></path>
						</svg>
                    <p class="text-[#FFFF00]">{{ $colocation->pivot->role }}</p>
                </div>
                @endif
                <p class="flex items-center bg-gray-200 text-black px-1 rounded fixed right-4">{{$colocation->status}}</p>
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
