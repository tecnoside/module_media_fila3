<?php

<<<<<<< HEAD
<<<<<<< HEAD
declare(strict_types=1);

namespace Modules\Media\Providers;

use Modules\Xot\Providers\XotBaseServiceProvider;
use Modules\Xot\Services\BladeService;

class MediaServiceProvider extends XotBaseServiceProvider {
    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public string $module_name = 'media';

    public function bootCallback(): void {
        BladeService::registerComponents($this->module_dir.'/../View/Components', 'Modules\\Media');
=======
namespace Modules\Media\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class MediaServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Media';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'media';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
=======
declare(strict_types=1);
>>>>>>> 4757f34 (.)

namespace Modules\Media\Providers;

use Modules\Xot\Providers\XotBaseServiceProvider;
use Modules\Xot\Services\BladeService;

class MediaServiceProvider extends XotBaseServiceProvider {
    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public string $module_name = 'media';

<<<<<<< HEAD
    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
>>>>>>> c8055c5 (first commit)
=======
    public function bootCallback(): void {
        BladeService::registerComponents($this->module_dir.'/../View/Components', 'Modules\\Media');
>>>>>>> 4757f34 (.)
    }
}
