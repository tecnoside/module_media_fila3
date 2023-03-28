<form method="POST" wire:submit.prevent="submit">
    <x-flash-message />
    <x-media.index :name="$name" :model="$model" :collection="$collection" />
    <x-button type="submit">Salva</x-button>
</form>
