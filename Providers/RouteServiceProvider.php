<?php

<<<<<<< HEAD
<<<<<<< HEAD
declare(strict_types=1);

namespace Modules\Media\Providers;

use Modules\Xot\Providers\XotBaseRouteServiceProvider;

class RouteServiceProvider extends XotBaseRouteServiceProvider {
    /**
     * The module namespace to assume when generating URLs to actions.
     */
    protected string $moduleNamespace = 'Modules\Media\Http\Controllers';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;
=======
=======
declare(strict_types=1);

>>>>>>> 4757f34 (.)
namespace Modules\Media\Providers;

use Modules\Xot\Providers\XotBaseRouteServiceProvider;

class RouteServiceProvider extends XotBaseRouteServiceProvider {
    /**
     * The module namespace to assume when generating URLs to actions.
     */
    protected string $moduleNamespace = 'Modules\Media\Http\Controllers';

    protected string $module_dir = __DIR__;

<<<<<<< HEAD
    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->moduleNamespace)
            ->group(module_path('Media', '/Routes/api.php'));
    }
>>>>>>> c8055c5 (first commit)
=======
    protected string $module_ns = __NAMESPACE__;
>>>>>>> 4757f34 (.)
}
