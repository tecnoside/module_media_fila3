<?php

declare(strict_types=1);

namespace Modules\Media\Models;

/**
 * --.
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
