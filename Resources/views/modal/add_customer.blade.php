@if (isset($form_data['tags']))
    @foreach ($form_data['tags'] as $k=>$vc)
        @if (isset($vc['id']))
            <x-input.group type="checkbox" name="tags.{{ $k }}.active" label="{{ $vc['label'] }}">
                </x-input>
            {{--  
            <input type="text" wire:model="form_data.tags.{{ $k }}.active" />
            {{ print_r($vc,true) }}
            --}}
        @endif
    @endforeach
@endif

<button class="btn btn-primary" wire:click="sendData()">TEST</button>
