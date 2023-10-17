<?php

declare(strict_types=1);

namespace Modules\Media\Database\Factories;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Modules\Media\Models\TemporaryUpload;

class TemporaryUploadFactory
{
    private int $fakeImageWidth = 10;
    private int $fakeImageHeight = 10;

    public static function new(): self
    {
<<<<<<< HEAD
        return new static();
=======
        return new static;
>>>>>>> 49d7c0c (first)
    }

    public function useFakeImageDimensions(int $fakeImageWidth, int $fakeImageHeight): self
    {
        $this->fakeImageWidth = $fakeImageWidth;

        $this->fakeImageHeight = $fakeImageHeight;

        return $this;
    }

    public function create(array $attributes = []): TemporaryUpload
    {
        $file = UploadedFile::fake()->image('test.jpg', $this->fakeImageWidth, $this->fakeImageHeight);

        return TemporaryUpload::createForFile(
            $file,
            session()->getId(),
            $attributes['uuid'] ?? Str::uuid(),
            $attributes['name'] ?? 'name',
        );
    }

    public function createMultiple(int $count, array $attributes = []): array
    {
        return Collection::times($count)
            ->map(fn (): TemporaryUpload => $this->create($attributes))->toArray();
    }
}
