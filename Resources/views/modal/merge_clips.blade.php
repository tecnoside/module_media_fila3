<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    {{--
    <a href="{{ $this->panel->url('index') }}" class="btn btn-info">&laquo; Back</a>
    --}}
    <ul wire:sortable="updateTaskOrder">
     {{-- 
    @foreach ($this->rows->sortBy('pos') as $row)
        <li wire:sortable.item="{{ $row->id }}" wire:key="task-{{ $row->id }}">
            <h4 wire:sortable.handle>[{{ $row->pos }}] {!! $this->panel->optionLabel($row) !!}</h4>
            <button wire:click="removeTask({{ $row->id }})">Remove</button>
        </li>
    @endforeach
    --}}
    <li wire:sortable.item="1" wire:key="task-1">
            <h4 wire:sortable.handle>UNO</h4>
            
        </li>
        <li wire:sortable.item="2" wire:key="task-2">
            <h4 wire:sortable.handle>DUE</h4>
            
        </li><li wire:sortable.item="3" wire:key="task-3">
            <h4 wire:sortable.handle>TRE</h4>
            
        </li>
</ul>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
@endpush