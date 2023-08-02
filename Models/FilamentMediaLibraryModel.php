<?php

declare(strict_types=1);

namespace Modules\Media\Models;

/**
 * Modules\Media\Models\FilamentMediaLibraryModel.
 *
 * @property int                             $id
 * @property string                          $model_type
 * @property int                             $model_id
 * @property string                          $media_library_item_id
 * @property string                          $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null                     $created_by
 * @property string|null                     $updated_by
 *
 * @method static \Illuminate\Database\Eloquent\Builder|FilamentMediaLibraryModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FilamentMediaLibraryModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FilamentMediaLibraryModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|FilamentMediaLibraryModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilamentMediaLibraryModel whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilamentMediaLibraryModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilamentMediaLibraryModel whereMediaLibraryItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilamentMediaLibraryModel whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilamentMediaLibraryModel whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilamentMediaLibraryModel whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilamentMediaLibraryModel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilamentMediaLibraryModel whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class FilamentMediaLibraryModel extends BaseMorphPivot
{
}
