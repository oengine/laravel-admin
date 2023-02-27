<?php

namespace OEngine\Admin\Builder\Menu;

use OEngine\Admin\Builder\HtmlBuilder;
use Illuminate\Support\Str;


class MenuItemBuilder extends HtmlBuilder
{
    public const ITEM_DIV = 'ITEM_DIV';
    public const ITEM_TAG = 'ITEM_TAG';
    public const ITEM_LINK = 'ITEM_LINK';
    public const ITEM_BUTTON = 'ITEM_BUTTON';
    public const ITEM_SUB = 'ITEM_SUB';

    public const KEY_TYPE = 'KEY_TYPE';
    public const KEY_TEXT = 'KEY_TEXT';
    public const KEY_ICON = 'KEY_ICON';
    public const KEY_ATTRIBUTE = 'KEY_ATTRIBUTE';
    public const KEY_SORT = 'KEY_SORT';
    public const KEY_TAG = 'KEY_TAG';
    public const KEY_LINK = 'KEY_LINK';
    public const KEY_CALLBACK = 'KEY_CALLBACK';
    public const KEY_BADGE = 'KEY_BADGE';


    protected MenuBuilder $parent;

    public function __construct($data = [], MenuBuilder $parent)
    {
        $this->dataItem = $data;
        $this->parent = $parent;
    }
    protected $dataItem = [];
    protected $subMenu = null;
    protected function getValue($key, $default = null)
    {
        if (isset($this->dataItem[$key]) && $this->dataItem[$key]) return $this->dataItem[$key];
        return $default;
    }
    public function getValueType()
    {
        return $this->getValue(self::KEY_TYPE);
    }
    public function getValueText()
    {
        return $this->getValue(self::KEY_TEXT);
    }
    public function getValueIcon()
    {
        return $this->getValue(self::KEY_ICON);
    }
    public function getValueAttribute()
    {
        return $this->getValue(self::KEY_ATTRIBUTE);
    }
    public function getValueSort()
    {
        return $this->getValue(self::KEY_SORT);
    }
    public function getValueTag()
    {
        return $this->getValue(self::KEY_TAG);
    }
    public function getValueLink()
    {
        return $this->getValue(self::KEY_LINK);
    }
    public function getValueCallback()
    {
        return $this->getValue(self::KEY_CALLBACK);
    }
    public function checkActive()
    {
        if ($this->getValueType() === self::ITEM_SUB) {
            return $this->subMenu->checkActive();
        }
        return MenuBuilder::checkUrl($this->getValueLink());
    }
    public function checkSubMenu()
    {
        return isset($this->subMenu) && $this->subMenu != null;
    }
    public function getSubMenu(): MenuBuilder
    {
        return $this->subMenu;
    }
    public function beforeRender()
    {
        if ($this->getValueType() === self::ITEM_SUB) {
            $callback = $this->getValueCallback();
            if ($callback && is_callable($callback)) {
                $this->subMenu = new MenuBuilder($this->parent->getPosition(), true, $this->parent->getSubLevel() + 1, $this);
                $callback($this->subMenu);
                $this->subMenu->beforeRender();
            }
        } else {
            $link = $this->getValueLink();
            if (!$link) return;

            if (is_callable($link)) {
                $this->dataItem[self::KEY_LINK] = $link($this);
            } else if (is_array($link)) {
                ['route' => $route, 'params' => $params] = $link;
                $this->dataItem[self::KEY_LINK] = route($route, $params);
            }
        }
    }
    protected function getClass()
    {
        $class = 'nav-item';
        if ($this->parent->getSubLevel() > 0) {
            $class = 'dropdown-item';
        }
        if ($this->subMenu) {
            if ($this->parent->getSubLevel() > 0) {
                $class .= '  dropdown-toggle ';
            } else {
                $class .= ' dropdown ';
            }
        }
        return $class;
    }
    protected function render()
    {
        $text = $this->getValueText();
        $icon = $this->getValueIcon();
        if (!$icon && $this->parent->getSubLevel() == 0) {
            $icon = '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5"></path>
            <path d="M12 12l8 -4.5"></path>
            <path d="M12 12l0 9"></path>
            <path d="M12 12l-8 -4.5"></path>
            <path d="M16 5.25l-8 4.5"></path>
        </svg>';
        }
        $type = $this->getValueType();
        if ($this->subMenu) {
            if ($this->parent->getSubLevel() > 0) {
                echo '<div class="dropend">';
                echo '<a class="' . $this->getClass() . '" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">';
                if ($icon) {
                    echo '<span class="nav-link-icon d-md-none d-lg-inline-block">';
                    echo $icon;
                    echo '</span>';
                }
                echo '<span class="nav-link-title">';
                echo $text;
                echo '</span>';
                echo    "</a>";
                echo  $this->subMenu->toHtml();
                echo '</div>';
            } else {
                echo '<div class="' . $this->getClass() . '">';
                echo '<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">';
                if ($icon) {
                    echo '<span class="nav-link-icon d-md-none d-lg-inline-block">';
                    echo $icon;
                    echo '</span>';
                }
                echo '<span class="nav-link-title">';
                echo $text;
                echo '</span>';
                echo    "</a>";
                echo  $this->subMenu->toHtml();
                echo '</div>';
            }
        } else if ($type && $type === self::ITEM_LINK) {
            if ($this->parent->getSubLevel() > 0) {
                // echo '<div class="' . $this->getClass() . '">';
                echo '<a  class="' . $this->getClass() . '" href="' . $this->getValueLink() . '">';
                echo  $text . '----' . $this->parent->getSubLevel();
                echo '<span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>';
                echo  "</a>";
                // echo '</div>';
            } else {
                echo '<div class="' . $this->getClass() . '">';
                echo '<a class="nav-link" href="' . $this->getValueLink() . '">';
                if ($icon) {
                    echo '<span class="nav-link-icon d-md-none d-lg-inline-block">';
                    echo $icon;
                    echo '</span>';

                    echo '<span class="nav-link-title">';
                    echo $text;
                    echo '</span>';
                } else {
                    echo $text;
                }
                echo    "</a>";

                echo '</div>';
            }
        }
    }
}
