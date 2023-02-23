<?php

namespace OEngine\Admin\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class AuthController extends BaseController
{
    public function getLogin()
    {
        return viewt("admin::auth.login");
    }
    public function postLogin()
    {
        return viewt("admin::auth.login");
    }
}
