<form method="POST" wire:submit.prevent="submit">
    <x-flash-message />
    aaaa bbb
    <x-media.index :name="$name" :model="$model" :collection="$collection" rules="max:1000000" />
    <x-button type="submit">Salva</x-button>
</form>
