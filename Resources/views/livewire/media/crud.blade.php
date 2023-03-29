<<<<<<< HEAD
<div>
    <form method="POST" wire:submit.prevent="submit">
    <x-flash-message />
    <x-media.index :name="$name" :model="$model" :collection="$collection" />
    <button wire:click="submit" type="button">Salva</button>
    <x-button type="submit">Salva</x-button>
    </form>
</div>
=======
<form method="POST" wire:submit.prevent="submit">
    <x-flash-message />
    <x-media.index :name="$name" :model="$model" :collection="$collection" />
    <x-button type="submit">Salva</x-button>
</form>
>>>>>>> 784b0f8acff5748761998ab083fdbd20d6ffa3d9
