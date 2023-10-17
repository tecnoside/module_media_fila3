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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return new static();
=======
        return new static;
>>>>>>> 49d7c0c (first)
=======
        return new static;
>>>>>>> master
=======
        return new static();
>>>>>>> ed2c51e (Check & fix styling)
=======
        return new static;
>>>>>>> 0d0c96c (Dusting)
=======
        return new static();
>>>>>>> a4cf9d3 (Check & fix styling)
=======
        return new static;
>>>>>>> ca4973d (Dusting)
=======
        return new static();
>>>>>>> 93f1e9f (Check & fix styling)
=======
        return new static;
>>>>>>> cafc8d1 (Dusting)
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
