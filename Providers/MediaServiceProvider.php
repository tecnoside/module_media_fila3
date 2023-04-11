<?php

declare(strict_types=1);

namespace Modules\Media\Providers;

use Modules\Xot\Providers\XotBaseServiceProvider;
use Modules\Xot\Services\BladeService;

class MediaServiceProvider extends XotBaseServiceProvider
{
    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public string $module_name = 'media';

    public function bootCallback(): void
    {
        // BladeService::registerComponents($this->module_dir.'/../View/Components', 'Modules\\Media');
    }
}
