<?php

namespace Edalzell\Anvil;

use Edalzell\Anvil\Http\Controllers\Actions\DeploymentLogController;
use Edalzell\Anvil\Http\Controllers\Actions\DeploySiteController;
use Edalzell\Anvil\Http\Controllers\SiteController;
use Statamic\Facades\Utility;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $scripts = [
        __DIR__.'/../dist/js/cp.js',
    ];

    public function boot()
    {
        parent::boot();

        $this->bootNav();
    }

    private function bootNav()
    {
        $utility = Utility::make('anvil')
            ->action(SiteController::class)
            ->icon('hammer-wrench')
            ->description('Manage your Forge Site');

        $utility->routes(function ($router) {
            $router->post('deploy', [DeploySiteController::class, '__invoke'])->name('deploy');
            $router->get('deployment-log', [DeploymentLogController::class, '__invoke'])->name('deployment-log');
        });

        $utility->register();
    }
}
