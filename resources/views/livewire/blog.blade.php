<div>
    <div class="row p-2">
        @foreach($tagList as $index => $tag)
        <div wire:key="tree_{{ $index }}"
            class="bg-{{$tag['color']}}-100 rounded-r-full p-2  m-1 h-6 min-w-10 flex items-center justify-center d-flex"
            onmouseover="@this.toggleIcon({{ $index }})" onmouseout="@this.toggleIcon(null)">
            <span class="text-{{$tag['color']}}-400">{{ $tag['name'] }}</span>
            @if($currentIndex === $index)
            <i
                class="bi bi-three-dots px-1  text-base bg-{{$tag['color']}}-100 text-{{$tag['color']}}-300 hover:text-{{$tag['color']}}-900"></i>

            <i class="bi bi-x text-base bg-{{$tag['color']}}-100 text-{{$tag['color']}}-300 hover:text-{{$tag['color']}}-900 rounded-r-full"
                wire:click="removeTag({{ $index }})"></i>
            @endif
        </div>
        @endforeach
    </div>

    <input type=" text" class=" border" wire:model="newName" wire:keydown.enter="addNameToList" />

</div>