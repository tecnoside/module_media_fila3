<?php

declare(strict_types=1);

namespace Modules\Media\Services;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use SimpleXMLElement;

use function count;
>>>>>>> 49d7c0c (first)
=======
use SimpleXMLElement;

use function count;
>>>>>>> master
=======
>>>>>>> ed2c51e (Check & fix styling)
=======
use SimpleXMLElement;

use function count;
>>>>>>> 0d0c96c (Dusting)

/**
 * SubtitleService.
 */
class SubtitleService
{
    private static ?self $instance = null;

    public string $disk = 'media';
    // nome che usa storage
    public string $file_path;
    // siamo in subtitle, percio' il file e' dei subtitle
    public string $field_name = 'txt';

    public Model $model;

    public array $subtitles;

    /**
     * ---.
     */
    public static function getInstance(): self
    {
        if (! self::$instance instanceof \Modules\Media\Services\SubtitleService) {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            self::$instance = new self();
=======
            self::$instance = new self;
>>>>>>> 49d7c0c (first)
=======
            self::$instance = new self;
>>>>>>> master
=======
            self::$instance = new self();
>>>>>>> ed2c51e (Check & fix styling)
=======
            self::$instance = new self;
>>>>>>> 0d0c96c (Dusting)
        }

        return self::$instance;
    }

    /**
     * ---.
     */
    public static function make(): self
    {
        return static::getInstance();
    }

    public function setFilePath(string $file_path): self
    {
        $this->file_path = $file_path;

        return $this;
    }

    public function setModel(Model $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function upateModel(): self
    {
        $plain = $this->getPlain();
        $up = [$this->field_name => $plain];
        $this->model = tap($this->model)->update($up);

        return $this;
    }

    /**
     * Undocumented function.
     */
    public function getPlain(): string
    {
        $content = $this->getContent();
        $xmlObject = simplexml_load_string($content);
        if (false === $xmlObject) {
            return '';
            // throw new Exception('['.__LINE__.']['.__FILE__.']');
        }
        $txt = '';
        foreach ($xmlObject->annotation->type->sentence as $sentence) {
            foreach ($sentence->item as $item) {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                $txt .= $item->__toString().' ';
=======
                $txt .= $item->__toString() . ' ';
>>>>>>> 49d7c0c (first)
=======
                $txt .= $item->__toString() . ' ';
>>>>>>> master
=======
                $txt .= $item->__toString().' ';
>>>>>>> ed2c51e (Check & fix styling)
=======
                $txt .= $item->__toString() . ' ';
>>>>>>> 0d0c96c (Dusting)
            }
        }

        return $txt;
    }

    /**
     * restituisce i sottotitoli, dal file ..
     */
    public function get(): array
    {
        $info = pathinfo($this->file_path);
        if (! isset($info['extension'])) {
            return [];
        }
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $func = 'getFrom'.Str::studly($info['extension']);
=======
        $func = 'getFrom' . Str::studly($info['extension']);
>>>>>>> 49d7c0c (first)
=======
        $func = 'getFrom' . Str::studly($info['extension']);
>>>>>>> master
=======
        $func = 'getFrom'.Str::studly($info['extension']);
>>>>>>> ed2c51e (Check & fix styling)
=======
        $func = 'getFrom' . Str::studly($info['extension']);
>>>>>>> 0d0c96c (Dusting)

        return $this->{$func}();
    }

    /**
     * Undocumented function.
     */
    public function getContent(): string
    {
        // $path = Storage::disk($this->disk)->path('videos/'.$this->file_path);
        // $path = Storage::path($this->file_path);
        // $path = realpath($path);
        $path = realpath($this->file_path);
        if (false === $path) {
            return '';
            /*
            throw new Exception('path:['.$path.']'.PHP_EOL.'
                file_path:['.$this->file_path.']'.PHP_EOL.'
                ['.__LINE__.']['.__FILE__.']'.PHP_EOL);
            */
        }

        return File::get($path);
    }

    public function getFromXml(): array
    {
        $this->subtitles = [];
        $content = $this->getContent();
        $xmlObject = simplexml_load_string($content);
        if (false === $xmlObject) {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            throw new \Exception('content:['.$content.']'.PHP_EOL.'['.__LINE__.']['.__FILE__.']');
=======
            throw new Exception('content:[' . $content . ']' . PHP_EOL . '[' . __LINE__ . '][' . __FILE__ . ']');
>>>>>>> 49d7c0c (first)
=======
            throw new Exception('content:[' . $content . ']' . PHP_EOL . '[' . __LINE__ . '][' . __FILE__ . ']');
>>>>>>> master
=======
            throw new \Exception('content:['.$content.']'.PHP_EOL.'['.__LINE__.']['.__FILE__.']');
>>>>>>> ed2c51e (Check & fix styling)
=======
            throw new Exception('content:[' . $content . ']' . PHP_EOL . '[' . __LINE__ . '][' . __FILE__ . ']');
>>>>>>> 0d0c96c (Dusting)
        }

        $data = [];
        $sentence_i = 0;
        foreach ($xmlObject->annotation->type->sentence as $sentence) {
            $item_i = 0;
            foreach ($sentence->item as $item) {
                $attributes = $item->attributes();
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                if (! $attributes instanceof \SimpleXMLElement) {
                    throw new \Exception('['.__LINE__.']['.__FILE__.']');
=======
                if (! $attributes instanceof SimpleXMLElement) {
                    throw new Exception('[' . __LINE__ . '][' . __FILE__ . ']');
>>>>>>> 49d7c0c (first)
=======
                if (! $attributes instanceof SimpleXMLElement) {
                    throw new Exception('[' . __LINE__ . '][' . __FILE__ . ']');
>>>>>>> master
=======
                if (! $attributes instanceof \SimpleXMLElement) {
                    throw new \Exception('['.__LINE__.']['.__FILE__.']');
>>>>>>> ed2c51e (Check & fix styling)
=======
                if (! $attributes instanceof SimpleXMLElement) {
                    throw new Exception('[' . __LINE__ . '][' . __FILE__ . ']');
>>>>>>> 0d0c96c (Dusting)
                }
                // 00:06:35,360
                $start = (int) $attributes->start->__toString() / 1000;
                $end = (int) $attributes->end->__toString() / 1000;
                // dddx([$start,$this->secondsToHms($start),$end,$this->secondsToHms($end)]);
                $tmp = [
                    // 'id' => $i++,
                    'sentence_i' => $sentence_i,
                    'item_i' => $item_i,
                    'start' => $start,
                    'end' => $end,
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                    'time' => secondsToHms($start).','.secondsToHms($end),
=======
                    'time' => secondsToHms($start) . ',' . secondsToHms($end),
>>>>>>> master
                    'text' => $item->__toString(),
                ];
                $data[] = $tmp;
                $item_i++;
            }
<<<<<<< HEAD
            ++$sentence_i;
=======
                    'time' => secondsToHms($start) . ',' . secondsToHms($end),
=======
                    'time' => secondsToHms($start).','.secondsToHms($end),
>>>>>>> ed2c51e (Check & fix styling)
=======
                    'time' => secondsToHms($start) . ',' . secondsToHms($end),
>>>>>>> 0d0c96c (Dusting)
                    'text' => $item->__toString(),
                ];
                $data[] = $tmp;
                $item_i++;
            }
<<<<<<< HEAD
<<<<<<< HEAD
            $sentence_i++;
>>>>>>> 49d7c0c (first)
=======
            $sentence_i++;
>>>>>>> master
=======
            ++$sentence_i;
>>>>>>> ed2c51e (Check & fix styling)
=======
            $sentence_i++;
>>>>>>> 0d0c96c (Dusting)
        }

        return $data;
    }

    /**
     * Undocumented function.
     *
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @param string $srtFile
     * @param string $webVttFile
=======
     * @param  string  $srtFile
     * @param  string  $webVttFile
>>>>>>> 49d7c0c (first)
=======
     * @param  string  $srtFile
     * @param  string  $webVttFile
>>>>>>> master
=======
     * @param string $srtFile
     * @param string $webVttFile
>>>>>>> ed2c51e (Check & fix styling)
=======
     * @param  string  $srtFile
     * @param  string  $webVttFile
>>>>>>> 0d0c96c (Dusting)
     */
    public function srtToVtt($srtFile, $webVttFile): void
    {
        $fileHandle = fopen(public_path($srtFile), 'r');
        $lines = [];
        if ($fileHandle) {
            // $lines = [];
            while (($line = fgets($fileHandle, 8192)) !== false) {
                $lines[] = $line;
            }
            if (! feof($fileHandle)) {
                exit("Error: unexpected fgets() fail\n");
            }
            // ($fileHandle);
        }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $length = \count($lines);
        for ($index = 1; $index < $length; ++$index) {
=======
        $length = count($lines);
        for ($index = 1; $index < $length; $index++) {
>>>>>>> 49d7c0c (first)
=======
        $length = count($lines);
        for ($index = 1; $index < $length; $index++) {
>>>>>>> master
=======
        $length = \count($lines);
        for ($index = 1; $index < $length; ++$index) {
>>>>>>> ed2c51e (Check & fix styling)
=======
        $length = count($lines);
        for ($index = 1; $index < $length; $index++) {
>>>>>>> 0d0c96c (Dusting)
            if (1 === $index || '' === trim($lines[$index - 2])) {
                $lines[$index] = str_replace(',', '.', $lines[$index]);
            }
        }
        $header = "WEBVTT\n\n";
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        file_put_contents(public_path($webVttFile), $header.implode('', $lines));
=======
        file_put_contents(public_path($webVttFile), $header . implode('', $lines));
>>>>>>> 49d7c0c (first)
=======
        file_put_contents(public_path($webVttFile), $header . implode('', $lines));
>>>>>>> master
=======
        file_put_contents(public_path($webVttFile), $header.implode('', $lines));
>>>>>>> ed2c51e (Check & fix styling)
=======
        file_put_contents(public_path($webVttFile), $header . implode('', $lines));
>>>>>>> 0d0c96c (Dusting)
    }
}
