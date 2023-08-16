<div>

     @forelse ($polls as $poll )
         <div class="mb-4">
            <h3 class="mb-4 text-xl">
                {{ $poll -> Title }}
            </h3>
            <div>
                @foreach ($poll->Option as $option)
                    <button class="btn" wire:click.prevent = 'addVote({{$option->id}})'>Vote</button>
                    {{$option->Name}}({{$option->Vote->count()}})<br>
                @endforeach
            </div>
         </div>
     @empty
         <div class="text-gray-500">
            <p>No Polls are available!</p>
         </div>
     @endforelse
</div>
