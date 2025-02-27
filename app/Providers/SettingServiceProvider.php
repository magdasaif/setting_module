<?php

namespace Modules\Setting\Providers;

// use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
// use Modules\Setting\Traits\Configuration;

class SettingServiceProvider extends ServiceProvider
{
    // use Configuration;
    //===================================================================================
    protected string $moduleName        = 'Setting';
    protected string $moduleNameLower   = 'setting';
    //===================================================================================
    /**
     * Boot the application events.
     */
    public function boot(): void{
        $this->registerCommands();
        $this->registerCommandSchedules();
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        // $this->loadMigrationsFrom($this->module_path($this->moduleName, 'database/migrations'));
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        // $this->overrideModuleFiles();
        //==============================================================================================
        // publish all package folder
        $this->publishes([
            dirname(__DIR__) .'/..' => base_path('Modules/Setting')        
        ], 'setting-module');
        //==============================================================================================
        // publish config
        $this->publishes([
            dirname(__DIR__) .'/../config/config.php' => config_path('setting.php'),
        ], 'setting-config');
        //==============================================================================================
    }
    //===================================================================================
    /**
     * Register the service provider.
     */
    public function register(): void{
        $this->app->register(EventServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
    }
    //===================================================================================
    /**
     * Register commands in the format of Command::class
     */
    protected function registerCommands(): void{
        $this->commands([
            \Modules\Setting\Console\PublishModuleCommand::class,
        ]);
    }
    //===================================================================================
    /**
     * Register command Schedules.
     */
    protected function registerCommandSchedules(): void{
        // $this->app->booted(function () {
        //     $schedule = $this->app->make(Schedule::class);
        //     $schedule->command('inspire')->hourly();
        // });
    }
    //===================================================================================
    /**
     * Register translations.
     */
    public function registerTranslations(): void{
        $langPath = resource_path('lang/modules/setting');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'setting');
            $this->loadJsonTranslationsFrom($langPath);
        } else {
            // $this->loadTranslationsFrom($this->module_path($this->moduleName, 'lang'), $this->moduleNameLower);
            // $this->loadJsonTranslationsFrom($this->module_path($this->moduleName, 'lang'));

            $this->loadTranslationsFrom(__DIR__.'/../../lang', 'setting');
            $this->loadJsonTranslationsFrom(__DIR__.'/../../lang');
        }
    }
    //===================================================================================
    /**
     * Register config.
     */
    protected function registerConfig(): void{
        //:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
        // $this->publishes([$this->module_path($this->moduleName, 'config/config.php') => config_path('setting.php')], 'config');
        // $this->mergeConfigFrom($this->module_path($this->moduleName, 'config/config.php'), $this->moduleNameLower);
        $this->publishes([__DIR__.'/../../config/config.php' => config_path('setting.php')], 'config');
        $this->mergeConfigFrom(__DIR__.'/../../config/config.php', 'setting');
        //:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    }
    //===================================================================================
    /**
     * Register views.
     */
    public function registerViews(): void{
        $viewPath = resource_path('views/modules/setting');
        // $sourcePath = $this->module_path($this->moduleName, 'resources/views');
        $sourcePath = __DIR__.'/../../resources/views';

        $this->publishes([$sourcePath => $viewPath], ['views','setting-module-views']);
        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), 'setting');
        $componentNamespace = str_replace('/', '\\', config('modules.namespace').'\\'.$this->moduleName.'\\'.ltrim(config('modules.paths.generator.component-class.path'), config('modules.paths.app_folder', '')));
        Blade::componentNamespace($componentNamespace, 'setting');
    }
    //===================================================================================
    /**
     * Get the services provided by the provider.
     *
     * @return array<string>
     */
    public function provides(): array {
        return [];
    }
    //===================================================================================
    /**
     * @return array<string>
     */
    private function getPublishableViewPaths(): array{
        $paths = [];
        foreach (config('view.paths') as $path) {
            if (is_dir($path.'/modules/setting')) {
                $paths[] = $path.'/modules/setting';
            }
        }
        return $paths;
    }
    //===================================================================================
}
