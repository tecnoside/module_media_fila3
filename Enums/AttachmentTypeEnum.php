<?php

declare(strict_types=1);

namespace Modules\Media\Enums;

<<<<<<< HEAD
// use Datomatic\LaravelEnumHelper\LaravelEnumHelper;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
// use Datomatic\LaravelEnumHelper\LaravelEnumHelper;
=======
use Datomatic\LaravelEnumHelper\LaravelEnumHelper;
>>>>>>> 771f698d (first)
=======
// use Datomatic\LaravelEnumHelper\LaravelEnumHelper;
>>>>>>> 7cc85766 (rebase 1)
<<<<<<< HEAD
>>>>>>> f1b3b202 (rebase 7)
=======
=======
// use Datomatic\LaravelEnumHelper\LaravelEnumHelper;
>>>>>>> 76f3bf5f (first)
>>>>>>> 6444d42f (rebase 7)
use Filament\Support\Contracts\HasLabel;
use Illuminate\Support\Facades\Lang;

enum AttachmentTypeEnum: string implements HasLabel
{
<<<<<<< HEAD
    // use LaravelEnumHelper;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    // use LaravelEnumHelper;
=======
    use LaravelEnumHelper;
>>>>>>> 771f698d (first)
=======
    // use LaravelEnumHelper;
>>>>>>> 7cc85766 (rebase 1)
<<<<<<< HEAD
>>>>>>> f1b3b202 (rebase 7)
=======
=======
    // use LaravelEnumHelper;
>>>>>>> 76f3bf5f (first)
>>>>>>> 6444d42f (rebase 7)

    case IMAGE = 'image';
    case VIDEO = 'video';
    case DOCUMENT = 'document';
    case MANUAL = 'manual';

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 7cc85766 (rebase 1)
<<<<<<< HEAD
>>>>>>> f1b3b202 (rebase 7)
=======
=======
>>>>>>> 76f3bf5f (first)
>>>>>>> 6444d42f (rebase 7)
    public static function getTypeNoteDescriptionsByValues(): array
    {
        return collect(self::cases())
            ->mapWithKeys(
                static fn (self $case): array => [$case->value => $case->getTypeNote()],
            )
            ->toArray();
    }

    public static function operationCases(): ?array
    {
        $originalCases = self::cases();
        array_pop($originalCases);

        return $originalCases;
    }

    protected static function translateBaseUniquePath(): string
    {
        return 'media::attachments.types';
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 771f698d (first)
=======
>>>>>>> 7cc85766 (rebase 1)
<<<<<<< HEAD
>>>>>>> f1b3b202 (rebase 7)
=======
=======
>>>>>>> 76f3bf5f (first)
>>>>>>> 6444d42f (rebase 7)
    public function getTypeNote(): ?string
    {
        $translationKey = sprintf('media::attachments.type_notes.%s', $this->value);
        if (Lang::has($translationKey)) {
            return trans($translationKey);
        }

        return null;
    }

<<<<<<< HEAD
    public function getLabel(): ?string
    {
        return trans('media::attachments.types.' . $this->value);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getLabel(): ?string
    {
        return trans('media::attachments.types.' . $this->value);
=======
    public static function getTypeNoteDescriptionsByValues(): array
    {
        return collect(self::cases())
            ->mapWithKeys(
                static fn (self $case): array => [$case->value => $case->getTypeNote()],
            )
            ->toArray();
    }

    protected static function translateBaseUniquePath(): string
    {
        return 'media::attachments.types';
    }

    public function getLabel(): ?string
    {
        return trans('media::attachments.types.'.$this->value);
    }

    public static function operationCases(): ?array
    {
        $originalCases = self::cases();
        array_pop($originalCases);

        return $originalCases;
>>>>>>> 771f698d (first)
=======
    public function getLabel(): ?string
    {
        return trans('media::attachments.types.' . $this->value);
>>>>>>> 7cc85766 (rebase 1)
<<<<<<< HEAD
>>>>>>> f1b3b202 (rebase 7)
=======
=======
    public function getLabel(): ?string
    {
        return trans('media::attachments.types.' . $this->value);
>>>>>>> 76f3bf5f (first)
>>>>>>> 6444d42f (rebase 7)
    }
}
