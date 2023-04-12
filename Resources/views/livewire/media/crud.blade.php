<form method="POST" wire:submit.prevent="submit">
    <x-flash-message />
<<<<<<< HEAD
    <x-media.index :name="$name" :model="$model" :collection="$collection" rules="max:1000000" />
=======
    <x-media.index :name="$name" :model="$model" :collection="$collection" />
>>>>>>> a573407 (up)
    <x-button type="submit">Salva</x-button>
</form>
