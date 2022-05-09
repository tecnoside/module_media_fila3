<?php
/**
 * --.
 */
declare(strict_types=1);

namespace Modules\Media\Models\Panels\Actions;

use Exception;
use Modules\Media\Services\VideoStreaming;
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;
use Psr\Http\Message\ServerRequestInterface;
use React\EventLoop\Factory;
use React\Filesystem\Filesystem;
use React\Http\Server;
use Throwable;

/**
 * Class PopulateVideoAction.
 */
class TestStreamingAction extends XotBasePanelAction {
    public bool $onItem = true;
    public string $icon = '<i class="fas fa-file-import"></i>';

    public function handle() {
        return $this->test04();
    }

    /**
     * @return mixed
     */
    public function test01() {
        $http = new \React\Http\HttpServer(function (ServerRequestInterface $request) {
            return new \React\Http\Message\Response(
                200,
                [
                    'Content-Type' => 'text/plain',
                ],
                'Hello World! '.now()."\n"
            );
        });
        $port = 8085;
        $url = '127.0.0.1:'.$port;
        $socket = new \React\Socket\SocketServer($url);
        $http->listen($socket);

        echo 'Server running at <a href="'.$url.'">'.$url.'</a>'.PHP_EOL;
    }

    /**
     * @return mixed
     */
    public function test02() {
        $loop = Factory::create();

        $videoStreaming = new VideoStreaming(Filesystem::create($loop));

        $server = new \React\Http\HttpServer($videoStreaming);
        $port = 8088;
        $url = '127.0.0.1:'.$port;

        $socket = new \React\Socket\Server($url, $loop);

        $server->listen($socket);

        $url = str_replace('tcp:', 'http:', $socket->getAddress());

        echo 'Server running at <a href="'.$url.'">'.$url.'</a>'.PHP_EOL;

        $server->on('error', function (Exception $exception) {
            echo $exception->getMessage().PHP_EOL;
        });

        //$loop->run(); //va in loop e non esce piu'
    }

    public function test03() {
        $loop = Factory::create();

        $videoStreaming = new VideoStreaming(Filesystem::create($loop));

        $http = new \React\Http\HttpServer($videoStreaming);

        $port = '8086';

        $socket = new \React\Socket\SocketServer('127.0.0.1:'.$port);
        $http->listen($socket);

        echo 'Server running at http://127.0.0.1:'.$port.PHP_EOL;
    }

    public function test04() {
        $loop = Factory::create();

        $filesystem = \React\Filesystem\Filesystem::create($loop);

        $server = new Server(function (ServerRequestInterface $request) use ($filesystem) {
            $file = $filesystem->file('media/bunny.mp4');

            return $file->open('r')->then(
                function (\React\Filesystem\Stream\ReadableStream $stream) {
                    return new \React\Http\Message\Response(200, ['Content-Type' => 'video/mp4'], $stream);
                },
                function (Exception $exception) {
                    echo $exception->getMessage().PHP_EOL;
                }
            );
        });

        $port = 8091;
        $url = '127.0.0.1:'.$port;

        $socket = new \React\Socket\Server($url, $loop);
        $server->listen($socket);
        $server->on('error', function (Throwable $t) {
            echo $t;
        });

        echo 'Listening on '.str_replace('tcp:', 'http:', $socket->getAddress())."\n";

        $loop->run();
    }
}
