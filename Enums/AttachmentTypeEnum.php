<?php

declare(strict_types=1);

namespace Modules\Media\Enums;

<<<<<<< HEAD
<<<<<<< HEAD
// use Datomatic\LaravelEnumHelper\LaravelEnumHelper;
=======
use Datomatic\LaravelEnumHelper\LaravelEnumHelper;
>>>>>>> 771f698d (first)
=======
// use Datomatic\LaravelEnumHelper\LaravelEnumHelper;
>>>>>>> 7cc85766 (rebase 1)
use Filament\Support\Contracts\HasLabel;
use Illuminate\Support\Facades\Lang;

enum AttachmentTypeEnum: string implements HasLabel
{
<<<<<<< HEAD
<<<<<<< HEAD
    // use LaravelEnumHelper;
=======
    use LaravelEnumHelper;
>>>>>>> 771f698d (first)
=======
    // use LaravelEnumHelper;
>>>>>>> 7cc85766 (rebase 1)

    case IMAGE = 'image';
    case VIDEO = 'video';
    case DOCUMENT = 'document';
    case MANUAL = 'manual';

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 7cc85766 (rebase 1)
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
=======
>>>>>>> 771f698d (first)
=======
>>>>>>> 7cc85766 (rebase 1)
    public function getTypeNote(): ?string
    {
        $translationKey = sprintf('media::attachments.type_notes.%s', $this->value);
        if (Lang::has($translationKey)) {
            return trans($translationKey);
        }

        return null;
    }

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
    }
}
