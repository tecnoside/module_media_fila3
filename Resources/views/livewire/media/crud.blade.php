<div>
    <form method="POST" wire:submit.prevent="submit">
    <x-flash-message />
    <x-media.index :name="$name" :model="$model" :collection="$collection" />
    <button wire:click="submit" type="button">Salva</button>
    <x-button type="submit">Salva</x-button>
    </form>
</div>
