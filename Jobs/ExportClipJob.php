<?php

/**
 * https://mayahi.net/laravel/queues-in-laravel-building-a-video-downloader-website/.
 */

declare(strict_types=1);

namespace Modules\Media\Jobs;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Modules\Mediamonitor\Services\MediaService;

/**
 * Undocumented class.
 */
class ExportClipJob implements ShouldQueue {
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    // public Model $model;
    public string $model_class;
    public int $model_id;
    public float $rangeFrom;
    public float $rangeTo;
    public int $user_id;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 3600;
    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 3;
    /**
     * The number of seconds to wait before retrying the job.
     *
     * @var int
     */
    public $backoff = 3;

    /**
     * Create a new job instance.
     */
    public function __construct(string $model_class, int $model_id, float $rangeFrom, float $rangeTo) {
        // \Symfony\Component\Process\Process::setTimeout(null);

        // $this->model = $model;
        $this->model_class = $model_class;
        $this->model_id = $model_id;
        $this->rangeFrom = $rangeFrom;
        $this->rangeTo = $rangeTo;
        $this->user_id = Auth::id();
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
            ->setRange($this->rangeFrom, $this->rangeTo)
            ->setUserId($this->user_id)
            ->exportClip();
    }
}
