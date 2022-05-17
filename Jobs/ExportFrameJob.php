<?php
/**
 * https://mayahi.net/laravel/queues-in-laravel-building-a-video-downloader-website/.
 */

declare(strict_types=1);

namespace Modules\Media\Jobs;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Modules\Mediamonitor\Services\MediaService;

/**
 * Undocumented class.
 */
class ExportFrameJob implements ShouldQueue {
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    // use SerializesModels;

    // public Model $model;
    public string $model_class;
    public int $model_id;
    public float $currentTime;

    /**
     * Create a new job instance.
     */
    public function __construct(string $model_class, int $model_id, float $currentTime) {
        $this->model_class = $model_class;
        $this->model_id = $model_id;
        $this->currentTime = $currentTime;
    }

    /**
     * Execute the job.
     *
     * @throws Exception
     *
     * @return void
     */
    public function handle() {
        $model = app($this->model_class)->find($this->model_id);
        MediaService::make()
            ->setModel($model)
            ->setCurrentTime($this->currentTime)
            ->exportFrame();
    }
}
