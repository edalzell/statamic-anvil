<?php

namespace Edalzell\Anvil\Http\Controllers;

use Laravel\Forge\Forge;
use Laravel\Forge\Resources\Site;
use Statamic\Http\Controllers\Controller;

abstract class BaseController extends Controller
{
    protected Forge $forge;
    protected Site $site;

    public function __construct()
    {
        $this->forge = new Forge(config('anvil.forge.token'));

        $this->site = $this->forge->site(config('anvil.forge.server'), config('anvil.forge.site'));
    }
}
