<?php

declare(strict_types=1);

namespace Modules\Media\Http\Controllers\VideoEditor;

/**
 * QueueControllerClass.
 *
 * @author Andchir <andycoderw@gmail.com>
 */
class QueueControllerClass extends BaseControllerClass {
    /**
     * QueueControllerClass constructor.
     *
     * @param array $config
     * @param array $lang
     */
    public function __construct($config = [], $lang = []) {
        parent::__construct($config, $lang);
    }

    /**
<<<<<<< HEAD
     * Run processing new task
=======
     * Run processing new task.
>>>>>>> 51fcb2a (up)
     *
     * @return bool|array
     */
    public function process() {
        $task = $this->getNextTask();
        if (false === $task) {
            return false;
        }

        $queueStore = $this->dbGetStore('queue');

        $task['status'] = 'processing';

        $tmpDirPath = $this->getPublicPath('tmp_dir', $task['user_id']);
<<<<<<< HEAD
        $cmdFilePath = $tmpDirPath.\DIRECTORY_SEPARATOR.$task['id'].'.txt';
=======
        $cmdFilePath = $tmpDirPath.DIRECTORY_SEPARATOR.$task['id'].'.txt';
>>>>>>> 51fcb2a (up)
        if (! file_exists($cmdFilePath)) {
            $queueStore->delete($task['id']);

            return false;
        }

<<<<<<< HEAD
        $progressLogPath = $tmpDirPath.\DIRECTORY_SEPARATOR.$task['id'].'_progress_.txt';
=======
        $progressLogPath = $tmpDirPath.DIRECTORY_SEPARATOR.$task['id'].'_progress_.txt';
>>>>>>> 51fcb2a (up)

        $cmd = file_get_contents($cmdFilePath);
        $cmd .= ' \\'.PHP_EOL.' -stats 2>> "'.$progressLogPath.'"';

        $pid = $this->execInBackground($cmd);

        $task['pid'] = $pid;
        $queueStore->set($task['id'], $task);

        return $task;
    }

    /**
<<<<<<< HEAD
     * Get next task
=======
     * Get next task.
>>>>>>> 51fcb2a (up)
     *
     * @param int $userId
     *
     * @return bool|array
     */
    public function getNextTask($userId = 0) {
        $queueStore = $this->dbGetStore('queue');
        $keys = $queueStore->getKeys();
        $output = false;

        foreach ($keys as $taskId) {
            $item = $queueStore->get($taskId);
<<<<<<< HEAD
            if ('pending' === $item['status'] && (! $userId || $userId === $item['user_id'])) {
=======
            if ('pending' == $item['status'] && (! $userId || $userId == $item['user_id'])) {
>>>>>>> 51fcb2a (up)
                $output = $item;
                $output['id'] = $taskId;
                break;
            }
        }

        return $output;
    }

    /**
<<<<<<< HEAD
     * Get current task
=======
     * Get current task.
>>>>>>> 51fcb2a (up)
     *
     * @param int $userId
     *
     * @return bool|mixed
     */
    public function getCurrentTask($userId = 0) {
        $queueStore = $this->dbGetStore('queue');
        $keys = $queueStore->getKeys();
        $output = false;

        foreach ($keys as $taskId) {
            $item = $queueStore->get($taskId);
<<<<<<< HEAD
            if ('processing' === $item['status'] && (! $userId || $userId === $item['user_id'])) {
=======
            if ('processing' == $item['status'] && (! $userId || $userId == $item['user_id'])) {
>>>>>>> 51fcb2a (up)
                $output = $item;
                $output['id'] = $taskId;
                break;
            }
        }

        return $output;
    }

    /**
<<<<<<< HEAD
     * Close queue task
=======
     * Close queue task.
>>>>>>> 51fcb2a (up)
     *
     * @return bool
     */
    public function closeTask($taskId) {
        $queueStore = $this->dbGetStore('queue');
        $task = $queueStore->get($taskId);
        if (empty($task)) {
            return false;
        }

        $tmpDirPath = $this->getPublicPath('tmp_dir', $task['user_id']);
<<<<<<< HEAD
        $cmdFilePath = $tmpDirPath.\DIRECTORY_SEPARATOR.$task['id'].'.txt';
        $progressLogPath = $tmpDirPath.\DIRECTORY_SEPARATOR.$task['id'].'_progress_.txt';
=======
        $cmdFilePath = $tmpDirPath.DIRECTORY_SEPARATOR.$task['id'].'.txt';
        $progressLogPath = $tmpDirPath.DIRECTORY_SEPARATOR.$task['id'].'_progress_.txt';
>>>>>>> 51fcb2a (up)
        $outputFormat = ! empty($task['options']) && ! empty($task['options']['format'])
            ? $task['options']['format']
            : 'mp4';
        $outputPath = $task['output_path'];

        // Add to log
        if (file_exists($progressLogPath)) {
            $logContent = file_get_contents($progressLogPath);
            $this->logging($logContent, $task['user_id']);
        }

        if (file_exists($outputPath)) {
            $user = $this->getUser(true, $task['user_id']);
            if (false === $user) {
                return false;
            }
            $freeSpace = $user['files_size_max'] - $user['files_size_total'];

            // Check file size
            $fileSize = filesize($outputPath);
            if ($fileSize > $freeSpace) {
                @unlink($outputPath);
                $this->logging('ERROR. The file size exceeds the allowed limit.', $task['user_id']);

                return false;
            }

            $outputType = ! empty($task['type']) ? $task['type'] : 'output';

            $videoProperties = $this->getVideoProperties($outputPath);
            $data = [
                'id' => $task['output_id'],
                'title' => $task['title'],
                'ext' => $outputFormat,
                'file_size' => filesize($outputPath),
                'time_stump' => time(),
                'allowed' => true,
                'width' => 0,
                'height' => 0,
                'duration_ms' => 0,
            ];
            $data = array_merge($data, $videoProperties);

            $mediaOutputStore = $this->dbGetStore('video_'.$outputType, $task['user_id']);
            $mediaOutputStore->set($task['output_id'], $data);
        }

        // Delete log files
        if (file_exists($cmdFilePath)) {
            @unlink($cmdFilePath);
        }
        if (file_exists($progressLogPath)) {
            @unlink($progressLogPath);
        }

        $queueStore->delete($task['id']);

        return true;
    }

    /**
<<<<<<< HEAD
     * Get queue status
=======
     * Get queue status.
>>>>>>> 51fcb2a (up)
     *
     * @param int $userId
     *
     * @return array
     */
    public function getUserQueueStatus($userId = 0) {
        if (empty($userId)) {
            $user = $this->getUser();
            if (! $user || empty($user['id'])) {
                return [0, 0, 0, 'not_logged_in'];
            }
            $userId = $user['id'];
        }

        $queueStore = $this->dbGetStore('queue');

        $keys = $queueStore->getKeys();
        $pendingCount = 0;
        $processingCount = 0;
        $percent = 0;
        $currentTaskStatus = '';
        $currentTaskId = '';

        foreach ($keys as $taskId) {
            $item = $queueStore->get($taskId);
<<<<<<< HEAD
            if ($item['user_id'] === $userId && ! $currentTaskStatus) {
                $currentTaskId = $taskId;
                $currentTaskStatus = $item['status'];
            }
            if ('pending' === $item['status']) {
                ++$pendingCount;
            }
            if ('processing' === $item['status']) {
=======
            if ($item['user_id'] == $userId && ! $currentTaskStatus) {
                $currentTaskId = $taskId;
                $currentTaskStatus = $item['status'];
            }
            if ('pending' == $item['status']) {
                ++$pendingCount;
            }
            if ('processing' == $item['status']) {
>>>>>>> 51fcb2a (up)
                ++$processingCount;
            }
        }

        if ($pendingCount > 0 && (! $this->config['queue_size'] || $processingCount < $this->config['queue_size'])) {
            $newTask = $this->process();
<<<<<<< HEAD
            if (false !== $newTask && ! $currentTaskId && $newTask['user_id'] === $userId) {
=======
            if (false !== $newTask && ! $currentTaskId && $newTask['user_id'] == $userId) {
>>>>>>> 51fcb2a (up)
                $currentTaskId = $newTask['id'];
                $currentTaskStatus = 'processing';
            }
        }

<<<<<<< HEAD
        if ($currentTaskId && 'processing' === $currentTaskStatus) {
=======
        if ($currentTaskId && 'processing' == $currentTaskStatus) {
>>>>>>> 51fcb2a (up)
            $percent = $this->getPercent($currentTaskId);
        }

        return [$pendingCount, $processingCount, $percent, $currentTaskStatus];
    }

    /**
<<<<<<< HEAD
     * Stop user`s process
=======
     * Stop user`s process.
>>>>>>> 51fcb2a (up)
     *
     * @param int $userId
     *
     * @return array
     */
    public function stopUserProcess($userId = 0) {
        if (empty($userId)) {
            $user = $this->getUser();
            if (! $user || empty($user['id'])) {
                return [
                    'success' => false,
                    'msg' => 'Forbidden.',
                ];
            }
            $userId = $user['id'];
        }

        $output = [
            'success' => false,
        ];

        $task = $this->getCurrentTask($userId);
        if (false === $task) {
            $task = $this->getNextTask($userId);
        }

        if (false !== $task && ! empty($task['pid'])) {
            if ($this->is_running($task['pid'])) {
                if ($this->kill($task['pid'])) {
                    sleep(2);
                    $this->closeTask($task['id']);
                    $output['success'] = true;
                }
            } else {
                $this->closeTask($task['id']);
            }
        }

        return $output;
    }

    /**
     * @return int
     */
    public function getPercent($taskId) {
        $queueStore = $this->dbGetStore('queue');
        $task = $queueStore->get($taskId);
        if (empty($task)) {
            return 0;
        }

        $tmpDirPath = $this->getPublicPath('tmp_dir', $task['user_id']);
<<<<<<< HEAD
        $progressLogPath = $tmpDirPath.\DIRECTORY_SEPARATOR.$task['id'].'_progress_.txt';
=======
        $progressLogPath = $tmpDirPath.DIRECTORY_SEPARATOR.$task['id'].'_progress_.txt';
>>>>>>> 51fcb2a (up)

        if (! file_exists($progressLogPath)) {
            return 0;
        }

        if ($task['pid'] && ! $this->is_running($task['pid'])) {
            $percent = 100;
        } else {
            $percent = $this->getFfmpegPercent($progressLogPath, $task['duration']);
        }

        if ($percent >= 99) {
            sleep(2);
            $this->closeTask($taskId);
            $percent = 100;
        }

        return $percent;
    }

    /**
     * Queue processing.
     */
    public function queueProcessing() {
        $queueStore = $this->dbGetStore('queue');

        $keys = $queueStore->getKeys();
        $pendingCount = 0;
        $processingCount = 0;

        foreach ($keys as $taskId) {
            $item = $queueStore->get($taskId);
<<<<<<< HEAD
            if ('pending' === $item['status']) {
                ++$pendingCount;
            }
            if ('processing' === $item['status']) {
=======
            if ('pending' == $item['status']) {
                ++$pendingCount;
            }
            if ('processing' == $item['status']) {
>>>>>>> 51fcb2a (up)
                if (! $this->is_running($item['pid'])) {
                    sleep(2);
                    $this->closeTask($item['id']);
                } else {
                    ++$processingCount;
                }
            }
        }

        if ($pendingCount > 0 && (! $this->config['queue_size'] || $processingCount < $this->config['queue_size'])) {
            $this->process();
        }

        return [$pendingCount, $processingCount];
    }

    /**
<<<<<<< HEAD
     * Get FFMpeg duration
=======
     * Get FFMpeg duration.
>>>>>>> 51fcb2a (up)
     *
     * @param string $content
     *
     * @return array|int|mixed
     */
    public function getFfmpegDuration($content = '') {
        $duration = 0;
        $output = 0;

        if ($content) {
            preg_match('/DURATION TOTAL: (.*)/', $content, $matches);
            if (! empty($matches) && ! empty($matches[1])) {
                return self::timeToSeconds($matches[1]);
            }

            preg_match_all("/Input #([^\,]), .* '(.+)'/", $content, $matches);
            $inputs = [];
            $isAudioExists = false;
            if (! empty($matches) && ! empty($matches[2])) {
                foreach ($matches[2] as $inp) {
                    $ext = $this->getExtension($inp);
<<<<<<< HEAD
                    if (\in_array($ext, ['mp3', 'wav'], true)) {
=======
                    if (in_array($ext, ['mp3', 'wav'])) {
>>>>>>> 51fcb2a (up)
                        $isAudioExists = true;
                    }
                    $inputs[] = $inp;
                }
            }

            preg_match_all('/Duration: (.*?), start:/', $content, $matches);
            $rawDuration = $matches[1];

            if (\is_array($rawDuration) && \count($rawDuration) > 1) {
                foreach ($rawDuration as $index => $dur) {
                    $ext = $this->getExtension($inputs[$index]);
                    if (! $ext) {
                        continue;
                    }
                    if ($isAudioExists) {
<<<<<<< HEAD
                        if (\in_array($ext, ['mp3', 'wav'], true)) {
=======
                        if (in_array($ext, ['mp3', 'wav'])) {
>>>>>>> 51fcb2a (up)
                            $duration += self::timeToSeconds($dur);
                        }
                    } else {
                        $duration += self::timeToSeconds($dur);
                    }
                }
                $output = $duration;
            } else {
                $output = self::timeToSeconds($rawDuration[0]);
            }
        }

        return $output;
    }

    /**
<<<<<<< HEAD
     * Get Ffmpeg percent
=======
     * Get Ffmpeg percent.
>>>>>>> 51fcb2a (up)
     *
     * @return float|int
     */
    public function getFfmpegPercent($logPath, $totalDuration = 0) {
        $output = 0;
        $content = file_exists($logPath)
            ? file_get_contents($logPath)
            : '';

        if (! $totalDuration) {
            $totalDuration = $this->getFfmpegDuration($content);
        }
        if (! $totalDuration) {
            return $output;
        }

        // current time
        preg_match_all('/time=(.*?) bitrate/', $content, $matches);

        $rawTime = array_pop($matches);
        if (\is_array($rawTime)) {
            $rawTime = array_pop($rawTime);
        }
        if (! empty($rawTime)) {
            $time = self::timeToSeconds($rawTime);
        } else {
            $time = $totalDuration;
        }

        $output = round(($time / $totalDuration) * 100);
        if ($output >= 99) {
            $output = 100;
        }

        return $output;
    }
}
