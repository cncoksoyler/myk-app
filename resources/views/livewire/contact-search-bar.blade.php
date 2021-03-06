<div class="relative">
    <input type="text" class="form-input" placeholder="Search Contacts..." wire:model="query" wire:keydown.escape="resetFilters" wire:keydown.tab="resetFilters" wire:keydown.arrow-up="decrementHighlight" wire:keydown.arrow-down="incrementHighlight" wire:keydown.enter="selectContact" />

    <div wire:loading class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
        <div class="list-item">Searching...</div>
    </div>

    @if(!empty($query))
    <div class="fixed top-0 bottom-0 left-0 right-0" wire:click="resetFilters"></div>

    <div class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
        @if(!empty($contacts))

        @foreach($contacts as $i => $contact)
        @php
        $contact['examid']=$examid
        @endphp

        <a href="{{ route('results.create',$contact) }}" class="list-item {{ $highlightIndex === $i ? 'highlight' : '' }}" class="absolute z-10 w-full bg-white rounded-t-none shadow-lg">
            {{ $contact['name'] }} - {{ $contact['surname'] }} - {{ $contact['TC'] }}</a>
        <br>


        @endforeach
        @else
        <div class="list-item">No results!</div>
        @endif
    </div>
    @endif
</div>