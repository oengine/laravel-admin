<?php

namespace OEngine\Admin;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use OEngine\Admin\Builder\Menu\MenuBuilder;
use OEngine\Admin\Facades\Menu;
use OEngine\LaravelPackage\ServicePackage;
use OEngine\Platform\Facades\Module;
use OEngine\Platform\Traits\WithServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    use WithServiceProvider;

    public function configurePackage(ServicePackage $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         */
        $package
            ->name('admin')
            ->hasConfigFile()
            ->hasViews()
            ->hasHelpers()
            ->hasAssets()
            ->hasTranslations()
            ->runsMigrations();
    }
    public function extending()
    {
    }
    public function packageRegistered()
    {
        $this->extending();
        add_filter(PLATFORM_CHECK_PERMISSION, function () {
            return true;
        });
    }
    private function bootGate()
    {
        if (!$this->app->runningInConsole()) {
            add_filter(PLATFORM_PERMISSION_CUSTOME, function ($prev) {
                return [
                    ...$prev
                ];
            });
        }
    }

    public function packageBooted()
    {
        $this->bootGate();
        Route::matched(function () {

            Menu::link(route('admin.home'), 'Dashboard');
            Menu::link('google.com', 'test123', '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
        </svg>');
            menu::subMenu('demo', '', function ($menu) {
                $menu->link('test2', 'test12');
                $menu->link('test3', 'test14');
                $menu->link('test4', 'test15');
            });
            Menu::attachMenu('option_demo', function ($menu) {
                $menu->link('thu1', 'thu3');
            });
            menu::subMenu('test', '', function (MenuBuilder $menu) {
                $menu->link('test2', 'test12');
                $menu->link('test3', 'test14');
                $menu->link('test4', 'test15');
                $menu->subMenu('test', '', function (MenuBuilder $menu) {

                    $menu->link('test4', 'test15');
                    $menu->setTargetId('option_demo');
                    $menu->subMenu('test', '', function (MenuBuilder $menu) {
                        $menu->link('test3', 'test14');
                        $menu->subMenu('test', '', function (MenuBuilder $menu) {
                            $menu->link('test3', 'test14');
                            $menu->subMenu('test', '', function (MenuBuilder $menu) {
                                $menu->link('test3', 'test14');
                                $menu->subMenu('test', '', function (MenuBuilder $menu) {
                                    $menu->link('test3', 'test14');
                                });
                            });
                        });
                    });
                    $menu->link('test2', 'test12');
                    $menu->link('test3', 'test14');
                });
            });
            Menu::link('google.com', 'test');
            Menu::attachMenu('option_demo', function (MenuBuilder $menu) {
                $menu->link('thu9', 'thu9', '', [], 0);
            });
        });
    }
}
