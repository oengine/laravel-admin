<?php

use OEngine\Admin\Facades\Menu;

if (!function_exists('menu_render')) {
    function menu_render()
    {
        return Menu::toHtml();
    }
}
