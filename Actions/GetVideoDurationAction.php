<?php
/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */
declare(strict_types=1);

namespace Modules\Media\Actions;

use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Spatie\QueueableAction\QueueableAction;

class GetVideoDurationAction
{
    use QueueableAction;

    /**
     * The number of seconds to wait before retrying the action.
     *
     * @var array<int>|int
     */
    public $backoff = 3;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 180;

    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Prepare the action for execution, leveraging constructor injection.
    }

    /**
     * Execute the action.
     */
    public function execute(string $disk, ?string $path): int
    {
        if (null == $path) {
            return -1;
        }
        // ffprobe -i <file> -show_entries format=duration -v quiet -of csv="p=0"
        $duration = FFMpeg::fromDisk($disk)
            ->open($path)
            ->getDurationInMiliseconds();

        return $duration;
    }
}
