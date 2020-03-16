<?php

namespace Silentz\Anvil\Http\Controllers\Actions;

use Silentz\Anvil\Http\Controllers\BaseController;

class DeploySiteController extends BaseController
{
    public function __invoke()
    {
        $this->site->deploySite();

        return response('Success');
    }
}
