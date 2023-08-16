<div>
    <form wire:submit.prevent = 'createPoll'>

        <div>
            <label>Poll Title</label>
        </div>
        <input type="text" wire:model = 'title'/>
        @error('title')
            <div class="text-red-500">{{$message}}</div>
        @enderror
        <div class="mt-4">
            <button class="btn" wire:click.prevent = 'addOption'>Add Option</button>
        </div>
        <div class="mb-4">
            @foreach($options as $index => $option)
                <div class="mt-4">
                    <label>Option {{$index +1}}</label>
                    <div class="flex gap-2">
                        <input type="text" wire:model="options.{{$index}}"/>
                        <button class="btn" wire:click.prevent = 'removeOption({{$index}})'>Remove</button>
                    </div>
                    @error("options.{$index}")
                            <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn">Create Poll</button>
    </form>
</div>
