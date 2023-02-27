<?php

namespace OEngine\Admin\Facades;

use Illuminate\Support\Facades\Facade;
use \OEngine\Admin\Builder\Menu\MenuBuilder;

/**
 * 
 * @method static MenuBuilder link($link, $text, $icon, $attributes, $sort1)
 * @method static MenuBuilder div($text, $icon, $attributes, $sort)
 * @method static MenuBuilder tag($tag, $text, $icon, $attributes, $sort)
 * @method static MenuBuilder button($text, $icon, $attributes, $sort)
 * @method static MenuBuilder subMenu($text, $icon, $callback, $sort)
 * @method static MenuBuilder attachMenu($targetId, $callback)
 * @method static MenuBuilder wrapDiv($class, $id, $attributes)
 * @method static MenuBuilder beforeRender()
 * @method static bool checkActive()
 * @method static string toHtml()
 *
 * @see MenuBuilder
 */
class Menu extends Facade
{
    protected static function getFacadeAccessor()
    {
        return MenuBuilder::class;
    }
}
