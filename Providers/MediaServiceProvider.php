<?php

declare(strict_types=1);

namespace Modules\Media\Providers;

use Modules\Xot\Providers\XotBaseServiceProvider;

class MediaServiceProvider extends XotBaseServiceProvider
{
    public string $module_name = 'media';
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> 771f698d (first)
=======
>>>>>>> 7cc85766 (rebase 1)
=======
>>>>>>> 76f3bf5f (first)
>>>>>>> 6444d42f (rebase 7)
=======
>>>>>>> 2f59e24c (.)
    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public function bootCallback(): void
    {
        // BladeService::registerComponents($this->module_dir.'/../View/Components', 'Modules\\Media');
    }
}
