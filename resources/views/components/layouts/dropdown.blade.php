<div x-data="{ open: false }">
    <span @click="open = ! open">{{ $trigger }}</span>
 
    <div x-show.important="open"  @click.outside="open = false">
        {{ $slot }}
    </div>
   
</div>