<?php

namespace Modules\Media\Database\Factories;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Modules\Media\Models\TemporaryUpload;

class TemporaryUploadFactory
{
    private int $fakeImageWidth = 10;
    private int $fakeImageHeight = 10;

<<<<<<< HEAD
    public static function new(): self
    {
        return new static;
=======
    public static function new(): self {
        return new static();
>>>>>>> 784b0f8acff5748761998ab083fdbd20d6ffa3d9
    }

    public function useFakeImageDimensions(int $fakeImageWidth, int $fakeImageHeight): self
    {
        $this->fakeImageWidth = $fakeImageWidth;

        $this->fakeImageHeight = $fakeImageHeight;

        return $this;
    }

    public function create(array $attributes = []): TemporaryUpload
    {
        $fakeUpload = UploadedFile::fake()->image('test.jpg', $this->fakeImageWidth, $this->fakeImageHeight);

        return TemporaryUpload::createForFile(
            $fakeUpload,
            session()->getId(),
            $attributes['uuid'] ?? Str::uuid(),
            $attributes['name'] ?? 'name',
        );
    }

    public function createMultiple(int $count, array $attributes = []): array
    {
        return Collection::times($count)
            ->map(fn () => $this->create($attributes))->toArray();
    }
}