<?php

declare(strict_types=1);

namespace Modules\Media\Providers;

use Modules\Xot\Providers\XotBaseServiceProvider;

class MediaServiceProvider extends XotBaseServiceProvider
{
    public string $module_name = 'media';
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> 771f698d (first)
=======
>>>>>>> 7cc85766 (rebase 1)
>>>>>>> f1b3b202 (rebase 7)
    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public function bootCallback(): void
    {
        // BladeService::registerComponents($this->module_dir.'/../View/Components', 'Modules\\Media');
    }
}
