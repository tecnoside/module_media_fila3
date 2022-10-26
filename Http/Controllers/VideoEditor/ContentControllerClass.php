<?php

declare(strict_types=1);

namespace Modules\Media\Http\Controllers\VideoEditor;

/**
 * ContentControllerClass.
 *
 * @author Andchir <andycoderw@gmail.com>
 */
class ContentControllerClass extends BaseControllerClass {
    /**
     * ContentControllerClass constructor.
     *
     * @param array $config
     * @param array $lang
     */
    public function __construct($config = [], $lang = []) {
        parent::__construct($config, $lang);
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Import media
=======
     * Import media.
>>>>>>> 51fcb2a (up)
=======
     * Import media.
>>>>>>> 3b1a9f8 (up)
     *
     * @return array
     */
    public function importMedia() {
        @ini_set('memory_limit', '-1');
        $output = [];

        $inputUrl = ! empty($_POST['input_url']) ? trim($_POST['input_url']) : '';
        $inputFile = ! empty($_FILES['input_file']) ? $_FILES['input_file'] : [];
        $inputTitle = ! empty($_POST['input_title']) ? trim($_POST['input_title']) : '';

        $user = $this->getUser(true);
        if (false === $user) {
            return [
                'success' => false,
                'msg' => 'Forbidden.',
            ];
        }

        $userDirPath = $this->getPublicPath('input_dir', $user['id']);
        $freeSpace = $user['files_size_max'] - $user['files_size_total'];

<<<<<<< HEAD
<<<<<<< HEAD
        if (! is_dir(\dirname($userDirPath))) {
            mkdir(\dirname($userDirPath));
=======
=======
>>>>>>> 3b1a9f8 (up)
        if (! is_dir(dirname($userDirPath))) {
            mkdir(dirname($userDirPath));
>>>>>>> 51fcb2a (up)
        }
        if (! is_dir($userDirPath)) {
            mkdir($userDirPath);
        }

        // Upload file
        if (! empty($inputFile)) {
            $error = '';
<<<<<<< HEAD
<<<<<<< HEAD
            for ($i = 0; $i < \count($inputFile['name']); ++$i) {
                if (UPLOAD_ERR_OK !== $inputFile['error'][$i]) {
=======
            for ($i = 0; $i < count($inputFile['name']); ++$i) {
                if (UPLOAD_ERR_OK != $inputFile['error'][$i]) {
>>>>>>> 51fcb2a (up)
=======
            for ($i = 0; $i < count($inputFile['name']); ++$i) {
                if (UPLOAD_ERR_OK != $inputFile['error'][$i]) {
>>>>>>> 3b1a9f8 (up)
                    continue;
                }
                $fileName = time().'_'.uniqid();
                $tmp_name = $inputFile['tmp_name'][$i];
                $name = $inputFile['name'][$i];
                $ext = $this->getExtension($name);
                $fileSize = filesize($tmp_name);
                $allowed_all = array_merge(
                    $this->config['upload_allowed'],
                    $this->config['upload_images'],
                    $this->config['upload_audio']
                );

<<<<<<< HEAD
<<<<<<< HEAD
                if (! \in_array($ext, $allowed_all, true)) {
=======
                if (! in_array($ext, $allowed_all)) {
>>>>>>> 51fcb2a (up)
=======
                if (! in_array($ext, $allowed_all)) {
>>>>>>> 3b1a9f8 (up)
                    $error = $this->lang['file_type_is_not_allowed'];
                    continue;
                }
                // Check file size
                if ($fileSize > $freeSpace) {
                    $error = $this->lang['file_size_exceeds_allowed_limit'];
                    continue;
                }

                $fileNameFull = $fileName.'.'.$ext;
<<<<<<< HEAD
<<<<<<< HEAD
                $uploadPath = $userDirPath.\DIRECTORY_SEPARATOR.$fileNameFull;
=======
                $uploadPath = $userDirPath.DIRECTORY_SEPARATOR.$fileNameFull;
>>>>>>> 51fcb2a (up)
=======
                $uploadPath = $userDirPath.DIRECTORY_SEPARATOR.$fileNameFull;
>>>>>>> 3b1a9f8 (up)

                move_uploaded_file($tmp_name, $uploadPath);

                $properties = $this->getVideoProperties($uploadPath);

                $data = [
                    'id' => $fileName,
                    'title' => ! empty($inputTitle) ? $inputTitle : strip_tags(str_replace('.'.$ext, '', $name)),
                    'ext' => $ext,
                    'file_size' => filesize($uploadPath),
                    'time_stump' => time(),
                ];

                $data = array_merge($data, $properties);

                // Save to DB
                $fileStore = $this->dbGetStore('video_input', $user['id']);
                $fileStore->set($fileName, $data);
            }

            if ($error) {
                $output = [
                    'success' => false,
                    'msg' => $error,
                ];
            } else {
                $output = ['success' => true];
            }
        } // Import from URL
        elseif (! empty($inputUrl)) {
            $fileName = time().'_'.uniqid();
            $videoFileUrl = $inputUrl;
            $ext = 'mp4';
            $allowed_all = array_merge(
                $this->config['upload_allowed'],
                $this->config['upload_images'],
                $this->config['upload_audio']
            );

            if ($this->getYoutubeId($inputUrl)) {
                $result = $this->getUrlFromYouTube($inputUrl);

                if (false === $result) {
                    return [
                        'success' => false,
                        'msg' => $this->lang['file_type_is_not_allowed'],
                    ];
                } else {
<<<<<<< HEAD
<<<<<<< HEAD
                    if (\is_array($result) && ! $result['success']) {
=======
                    if (is_array($result) && ! $result['success']) {
>>>>>>> 51fcb2a (up)
=======
                    if (is_array($result) && ! $result['success']) {
>>>>>>> 3b1a9f8 (up)
                        return $result;
                    }
                }
                $videoFileUrl = $result['data']['url'];
            } else {
                $ext = self::getExtension($videoFileUrl);
            }

<<<<<<< HEAD
<<<<<<< HEAD
            if (! \in_array($ext, $allowed_all, true)) {
=======
            if (! in_array($ext, $allowed_all)) {
>>>>>>> 51fcb2a (up)
=======
            if (! in_array($ext, $allowed_all)) {
>>>>>>> 3b1a9f8 (up)
                return [
                    'success' => false,
                    'msg' => $this->lang['file_type_is_not_allowed'],
                ];
            }

            $fileNameFull = $fileName.'.'.$ext;
<<<<<<< HEAD
<<<<<<< HEAD
            $uploadPath = $userDirPath.\DIRECTORY_SEPARATOR.$fileNameFull;
=======
            $uploadPath = $userDirPath.DIRECTORY_SEPARATOR.$fileNameFull;
>>>>>>> 51fcb2a (up)
=======
            $uploadPath = $userDirPath.DIRECTORY_SEPARATOR.$fileNameFull;
>>>>>>> 3b1a9f8 (up)

            $uploaded = file_put_contents($uploadPath, file_get_contents($videoFileUrl));

            if ($uploaded && file_exists($uploadPath)) {
                // Check file size
                $fileSize = filesize($uploadPath);
                if ($fileSize > $freeSpace) {
                    @unlink($uploadPath);

                    return [
                        'success' => false,
                        'msg' => $this->lang['file_size_exceeds_allowed_limit'],
                    ];
                }

                $properties = $this->getVideoProperties($uploadPath);

                $data = [
                    'id' => $fileName,
                    'title' => ! empty($inputTitle) ? $inputTitle : date('m/d/Y'),
                    'ext' => $ext,
                    'file_size' => filesize($uploadPath),
                    'time_stump' => time(),
                    'allowed' => true,
                ];

                $data = array_merge($data, $properties);

                // Save to DB
                $fileStore = $this->dbGetStore('video_input', $user['id']);
                $fileStore->set($fileName, $data);

                $output = ['success' => true];
            } else {
                $output = [
                    'success' => false,
                    'msg' => $this->lang['error_while_downloading_video'],
                ];
            }
        }

        return $output;
    }

    /**
     * @return array
     */
    public function getMediaList($type, $userId = 0) {
        $user = $this->getUser(false, $userId);
        if (false === $user) {
            return [
                'success' => false,
                'msg' => 'Forbidden.',
            ];
        }

        $fileStore = $this->dbGetStore('video_'.$type, $user['id']);
        $data = $fileStore->getAll();

        $data = array_reverse($data);

        foreach ($data as &$item) {
            $item['datetime'] = date('m.d.Y H:i:s', $item['time_stump']);
            $item['file_size'] = self::sizeFormat($item['file_size']);
            $item['duration_time'] = ! empty($item['duration_ms'])
                ? self::secondsToTime($item['duration_ms'] / 1000)
                : 0;
            $item['url'] = $this->config['base_url'].$this->config[$type.'_dir'];
<<<<<<< HEAD
<<<<<<< HEAD
            $item['url'] .= $user['id'].\DIRECTORY_SEPARATOR.$item['id'].'.'.$item['ext'];
=======
            $item['url'] .= $user['id'].DIRECTORY_SEPARATOR.$item['id'].'.'.$item['ext'];
>>>>>>> 51fcb2a (up)
=======
            $item['url'] .= $user['id'].DIRECTORY_SEPARATOR.$item['id'].'.'.$item['ext'];
>>>>>>> 3b1a9f8 (up)
            if (empty($item['width'])) {
                $item['width'] = 0;
            }
            if (empty($item['height'])) {
                $item['height'] = 0;
            }
        }

        return [
            'success' => true,
            'data' => ! empty($data) ? array_values($data) : [],
        ];
    }

    /**
     * @return array
     */
    public function getItemData($itemId, $type) {
        $user = $this->getUser();
        if (false === $user) {
            return [
                'success' => false,
                'msg' => 'Forbidden.',
            ];
        }

        $fileStore = $this->dbGetStore('video_'.$type, $user['id']);
        $item = $fileStore->get($itemId);

        if (empty($item)) {
            return [
                'success' => false,
                'msg' => 'Media not found.',
            ];
        }

        $item['datetime'] = date('m.d.Y H:i:s', $item['time_stump']);
        $item['file_size'] = self::sizeFormat($item['file_size']);
        $item['duration_time'] = ! empty($item['duration_ms'])
            ? self::secondsToTime($item['duration_ms'] / 1000)
            : 0;
        $item['url'] = $this->config['base_url'].$this->config[$type.'_dir'];
<<<<<<< HEAD
<<<<<<< HEAD
        $item['url'] .= $user['id'].\DIRECTORY_SEPARATOR.$item['id'].'.'.$item['ext'];
=======
        $item['url'] .= $user['id'].DIRECTORY_SEPARATOR.$item['id'].'.'.$item['ext'];
>>>>>>> 51fcb2a (up)
=======
        $item['url'] .= $user['id'].DIRECTORY_SEPARATOR.$item['id'].'.'.$item['ext'];
>>>>>>> 3b1a9f8 (up)

        return [
            'success' => true,
            'data' => $item,
        ];
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Update item data
=======
     * Update item data.
>>>>>>> 51fcb2a (up)
=======
     * Update item data.
>>>>>>> 3b1a9f8 (up)
     *
     * @return array
     */
    public function updateItemData($itemId, $type, $data) {
        $user = $this->getUser();
        if (false === $user) {
            return [
                'success' => false,
                'msg' => 'Forbidden.',
            ];
        }

        $fileStore = $this->dbGetStore('video_'.$type, $user['id']);
        $item = $fileStore->get($itemId);

        if (empty($item)) {
            return [
                'success' => false,
                'msg' => 'Media not found.',
            ];
        }

        $item = array_merge($item, $data);
        $fileStore->set($itemId, $item);

        return [
            'success' => true,
            'data' => $item,
        ];
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Delete item
=======
     * Delete item.
>>>>>>> 51fcb2a (up)
=======
     * Delete item.
>>>>>>> 3b1a9f8 (up)
     *
     * @return array
     */
    public function deleteItem($itemId, $type) {
        $user = $this->getUser();
        if (false === $user) {
            return [
                'success' => false,
                'msg' => 'Forbidden.',
            ];
        }

        $output = [];
        $fileStore = $this->dbGetStore('video_'.$type, $user['id']);

        if ($item = $fileStore->get($itemId)) {
            $filePath = $this->getPublicPath($type.'_dir', $user['id']);
<<<<<<< HEAD
<<<<<<< HEAD
            $filePath .= \DIRECTORY_SEPARATOR.$item['id'].'.'.$item['ext'];
=======
            $filePath .= DIRECTORY_SEPARATOR.$item['id'].'.'.$item['ext'];
>>>>>>> 51fcb2a (up)
=======
            $filePath .= DIRECTORY_SEPARATOR.$item['id'].'.'.$item['ext'];
>>>>>>> 3b1a9f8 (up)

            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $fileStore->delete($item['id']);
            $output['success'] = true;
        }

        return $output;
    }

    /**
     * @return array|bool
     */
    public function toggleItemStatusAdmin($itemId, $type, $userId) {
        $user = $this->getUser();
        if (false === $user || 'admin' !== $user['role']) {
            return [
                'success' => false,
                'msg' => 'Forbidden.',
            ];
        }

        $fileStore = $this->dbGetStore('video_'.$type, $userId);
        if ($item = $fileStore->get($itemId)) {
            if (! isset($item['allowed'])) {
                $item['allowed'] = true;
            } else {
                $item['allowed'] = ! $item['allowed'];
            }
            $fileStore->set($itemId, $item);

            return true;
        }

        return false;
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Download media
=======
     * Download media.
>>>>>>> 51fcb2a (up)
=======
     * Download media.
>>>>>>> 3b1a9f8 (up)
     *
     * @return array|bool
     */
    public function downloadMediaFile($itemId, $type) {
        $user = $this->getUser();
        if (false === $user) {
            echo 'Forbidden';
            exit;
        }

        $fileStore = $this->dbGetStore('video_'.$type, $user['id']);
        if ($item = $fileStore->get($itemId)) {
<<<<<<< HEAD
<<<<<<< HEAD
            if ('user' === $user['role'] && empty($item['allowed'])) {
=======
            if ('user' == $user['role'] && empty($item['allowed'])) {
>>>>>>> 51fcb2a (up)
=======
            if ('user' == $user['role'] && empty($item['allowed'])) {
>>>>>>> 3b1a9f8 (up)
                $template = $this->getTemplate('download_forbidden');

                return [
                    'content' => $template,
                ];
            }

            $filePath = $this->getMediaFilePath($type, $user['id'], $item);

            if (file_exists($filePath)) {
                $this->downloadFile($filePath, $item['title'].'.'.$item['ext']);
            }
            exit;
        }

        return false;
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Print video frame
=======
     * Print video frame.
>>>>>>> 51fcb2a (up)
=======
     * Print video frame.
>>>>>>> 3b1a9f8 (up)
     *
     * @param int $time
     */
    public function printFrame($itemId, $type, $time = 0) {
        $user = $this->getUser();
        if (false === $user) {
            $this->printBlankImage();
        }

        $fileStore = $this->dbGetStore('video_'.$type, $user['id']);
        $item = $fileStore->get($itemId);

        if (empty($item)) {
            $this->printBlankImage();
        }

        $videoFilePath = $this->getVideoPath($user['id'], $type, $item);
        if (! file_exists($videoFilePath)) {
            $this->printBlankImage();
        }

        $tmpPath = $this->getPublicPath('tmp_dir', $user['id']);
        if (! is_dir($tmpPath)) {
            mkdir($tmpPath);
        }

        $time = $time ? $time / 1000 : 0;
        $time = number_format($time, 2, '.', '');
<<<<<<< HEAD
<<<<<<< HEAD
        $frameImagePath = $tmpPath.\DIRECTORY_SEPARATOR.'frame_'.$item['id'];
=======
        $frameImagePath = $tmpPath.DIRECTORY_SEPARATOR.'frame_'.$item['id'];
>>>>>>> 51fcb2a (up)
=======
        $frameImagePath = $tmpPath.DIRECTORY_SEPARATOR.'frame_'.$item['id'];
>>>>>>> 3b1a9f8 (up)
        $frameImagePath .= '_'.str_replace('.', '-', $time).'.jpg';

        if (! file_exists($frameImagePath)) {
            $cmd = $this->config['ffmpeg_path']." -i \"{$videoFilePath}\" -ss $time";
            $cmd .= ' \\'.PHP_EOL.'-vf scale=400:300:force_original_aspect_ratio=increase';
            $cmd .= ' \\'.PHP_EOL.'-frames:v 1';
            $cmd .= ' \\'.PHP_EOL."-y \"{$frameImagePath}\" 2>&1";

            shell_exec($cmd);
            if (! file_exists($frameImagePath)) {
                $this->printBlankImage();
            }
        }

        $content = file_get_contents($frameImagePath);
        header('Content-Type: image/jpeg');
        echo $content;

        exit;
    }

    /**
     * @param bool $getCategories
     *
     * @return array
     */
    public function getLibraryContentList($input, $requestData, $getCategories = true) {
        $options = [
            'category' => isset($requestData['category']) ? urldecode($requestData['category']) : '',
            'page' => isset($requestData['page']) ? (int) trim($requestData['page']) : 1,
        ];
        $output = [
            'categories' => [],
            'items' => [],
            'total' => 0,
        ];
        $numberPerPage = 10;

<<<<<<< HEAD
<<<<<<< HEAD
        if (! \in_array($input, ['audio_library'], true)) {
=======
        if (! in_array($input, ['audio_library'])) {
>>>>>>> 51fcb2a (up)
=======
        if (! in_array($input, ['audio_library'])) {
>>>>>>> 3b1a9f8 (up)
            return $output;
        }
        $libraryDir = 'userfiles/'.$input;
        $path = $this->config['public_path'].$libraryDir;
        $files = scandir($path);

        if ($getCategories || ! $options['category']) {
            foreach ($files as $file) {
<<<<<<< HEAD
<<<<<<< HEAD
                if (\in_array($file, ['.', '..'], true) || ! is_dir($path.\DIRECTORY_SEPARATOR.$file)) {
=======
                if (in_array($file, ['.', '..']) || ! is_dir($path.DIRECTORY_SEPARATOR.$file)) {
>>>>>>> 51fcb2a (up)
=======
                if (in_array($file, ['.', '..']) || ! is_dir($path.DIRECTORY_SEPARATOR.$file)) {
>>>>>>> 3b1a9f8 (up)
                    continue;
                }
                $output['categories'][] = $file;
            }
            asort($output['categories']);
            if (! $options['category'] && ! empty($output['categories'])) {
                $options['category'] = $output['categories'][0];
            }
        }
        unset($files);

        if (! $options['category']) {
            return $output;
        }

<<<<<<< HEAD
<<<<<<< HEAD
        $categoryDir = $libraryDir.\DIRECTORY_SEPARATOR.$options['category'];
        $categoryDirPath = $this->config['public_path'].\DIRECTORY_SEPARATOR.$categoryDir;
=======
        $categoryDir = $libraryDir.DIRECTORY_SEPARATOR.$options['category'];
        $categoryDirPath = $this->config['public_path'].DIRECTORY_SEPARATOR.$categoryDir;
>>>>>>> 51fcb2a (up)
=======
        $categoryDir = $libraryDir.DIRECTORY_SEPARATOR.$options['category'];
        $categoryDirPath = $this->config['public_path'].DIRECTORY_SEPARATOR.$categoryDir;
>>>>>>> 3b1a9f8 (up)
        $files = scandir($categoryDirPath);

        foreach ($files as $file) {
            if (\in_array($file, ['.', '..'], true)) {
                continue;
            }
<<<<<<< HEAD
<<<<<<< HEAD
            $filePath = $categoryDirPath.\DIRECTORY_SEPARATOR.$file;
=======
            $filePath = $categoryDirPath.DIRECTORY_SEPARATOR.$file;
>>>>>>> 51fcb2a (up)
=======
            $filePath = $categoryDirPath.DIRECTORY_SEPARATOR.$file;
>>>>>>> 3b1a9f8 (up)
            $fileInfo = pathinfo($filePath);
            $output['items'][] = [
                'category' => $options['category'],
                'fileName' => $file,
<<<<<<< HEAD
<<<<<<< HEAD
                'url' => $this->config['base_url'].$categoryDir.\DIRECTORY_SEPARATOR.$file,
=======
                'url' => $this->config['base_url'].$categoryDir.DIRECTORY_SEPARATOR.$file,
>>>>>>> 51fcb2a (up)
=======
                'url' => $this->config['base_url'].$categoryDir.DIRECTORY_SEPARATOR.$file,
>>>>>>> 3b1a9f8 (up)
                'title' => $fileInfo['filename'],
                'ext' => $fileInfo['extension'],
                'file_size' => self::sizeFormat(filesize($filePath)),
            ];
        }

        $output['total'] = \count($output['items']);

        if (! empty($output['items'])) {
            usort($output['items'], function ($a, $b) {
                return strcmp($a['fileName'], $b['fileName']);
            });
        }

        $totalPages = ceil($output['total'] / $numberPerPage);
        $options['offset'] = $numberPerPage * ($options['page'] - 1);

        $output['items'] = \array_slice($output['items'], $options['offset'], $numberPerPage);

        return $output;
    }

    /**
     * Print blank image.
     */
    public function printBlankImage() {
        $im = imagecreatetruecolor(300, 250);
        $color = imagecolorallocate($im, 212, 212, 212);
        imagefilledrectangle($im, 0, 0, 300, 250, $color);
        header('Content-Type: image/jpeg');
        imagejpeg($im);
        imagedestroy($im);
        exit;
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Get video file path
=======
     * Get video file path.
>>>>>>> 51fcb2a (up)
=======
     * Get video file path.
>>>>>>> 3b1a9f8 (up)
     *
     * @return string
     */
    public function getVideoPath($userId, $type, $itemData) {
        $filePath = $this->getPublicPath($type.'_dir', $userId);
<<<<<<< HEAD
<<<<<<< HEAD
        $filePath .= \DIRECTORY_SEPARATOR.$itemData['id'].'.'.$itemData['ext'];
=======
        $filePath .= DIRECTORY_SEPARATOR.$itemData['id'].'.'.$itemData['ext'];
>>>>>>> 51fcb2a (up)
=======
        $filePath .= DIRECTORY_SEPARATOR.$itemData['id'].'.'.$itemData['ext'];
>>>>>>> 3b1a9f8 (up)

        return $filePath;
    }
}
