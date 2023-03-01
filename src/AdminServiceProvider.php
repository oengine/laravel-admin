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
            Menu::link(route('admin.home'), 'Dashboard')
                ->link('google.com', 'test123', '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
        </svg>');
            // Menu::link(, 'Setting', '', [], '', 99999999999999);
            menu::subMenu('Setting', '', function (MenuBuilder $menu) {
                $menu->setTargetId('setting_menu');
                $menu->link(route('admin.setting'), 'Account Setting');
            }, 99999999999999);
        });
    }
}
