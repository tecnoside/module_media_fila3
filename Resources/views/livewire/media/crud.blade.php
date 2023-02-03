<div>
    <x-flash-message />
    <x-media.index :name="$name" :model="$model" :collection="$collection" />
    <button wire:click="submit" type="button">Salva</button>
</div>
