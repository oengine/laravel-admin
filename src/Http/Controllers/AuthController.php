<?php

namespace OEngine\Admin\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class AuthController extends BaseController
{
    public function getLogin()
    {
        return tview("admin::auth.login");
    }
}
