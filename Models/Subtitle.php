<?php

declare(strict_types=1);

namespace Modules\Media\Models;

/**
 * Modules\Media\Models\Subtitle
 *
 * @property int $id
 * @property int|null $media_id
 * @property int|null $sentence_i
 * @property int|null $item_i
 * @property string|null $start
 * @property string|null $end
 * @property string|null $time
 * @property string|null $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @method static \Modules\Media\Database\Factories\SubtitleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Subtitle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subtitle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subtitle query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subtitle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subtitle whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subtitle whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subtitle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subtitle whereItemI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subtitle whereMediaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subtitle whereSentenceI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subtitle whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subtitle whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subtitle whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subtitle whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subtitle whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Subtitle extends BaseModel {
    /**
     * --.
     */
    protected $fillable = [
        'id',
        'media_id',
        'sentence_i', 'item_i',
        'start', 'end',
        'time',
        'text',
    ];
}
