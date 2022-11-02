<?php
/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */
declare(strict_types=1);

namespace Modules\Media\Actions;

use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Spatie\QueueableAction\QueueableAction;

class GetVideoScreenshotAction {
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
    public function __construct() {
        // Prepare the action for execution, leveraging constructor injection.
    }

    /**
     * Execute the action.
     */
    public function execute(string $disk_mp4, string $file_mp4, int $time, string $disk_jpg, string $file_jpg): array {
        $this->currentTime = 2;
        $model = Press::find($id);

        $file_mp4 = $model->file_mp4;
        $filename = Str::replace('.mp4', '-'.$this->currentTime, basename($file_mp4));
        $filename = Str::slug($filename).'.jpg';

        $toDisk = 'snaps';

        FFMpeg::fromDisk($model->disk)
            ->open($file_mp4)
            ->getFrameFromSeconds($this->currentTime)
            ->export()
            // local_root
            ->toDisk($toDisk)
            ->save($filename);

        $morph_map = [
            'media' => 'Modules\Mediamonitor\Models\Media',
            'press' => 'Modules\Mediamonitor\Models\Press',
        ];
        Relation::morphMap($morph_map);
        /**
         * @var SpatieImage
         */
        $image = $model
            ->addMediaFromDisk($filename, $toDisk)
            ->toMediaCollection($toDisk);

        return [
            'message' => 'ok',
            'status' => 200,
        ];
    }
}
