<?php

namespace OEngine\Admin;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use OEngine\LaravelPackage\ServicePackage;
use OEngine\Platform\Facades\Menu;
use OEngine\Platform\Menu\MenuBuilder;
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
        Menu::Register(function () {
            Menu::link(route('admin.home'), 'Dashboard');
            Menu::link(route('admin.table.list'), 'User');
            // Menu::link(, 'Setting', '', [], '', 99999999999999);
            menu::subMenu('Setting', '', function (MenuBuilder $menu) {
                $menu->setTargetId('setting_menu');
                $menu->link(route('admin.setting'), 'Account Setting');
            }, 99999999999999);
        });
    }
}
