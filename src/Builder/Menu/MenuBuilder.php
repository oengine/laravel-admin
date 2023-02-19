<?php

namespace OEngine\Admin\Builder\Menu;

use OEngine\Admin\Builder\HtmlBuilder;
use Illuminate\Support\Str;

class MenuBuilder extends HtmlBuilder
{
    const MENU = 0;
    const ITEM = 1;
    protected $menuType = MenuBuilder::MENU;
    protected $warps = [];
    protected $items = [];
    protected $targetId = '';
    public function TargetId($targetId)
    {
        $this->targetId = $targetId;
        return $this;
    }
    public function link($link, $text, $attributes = [], $sort = 100)
    {
        $this->items[] = [
            'type' => 'link',
            'link' => $link,
            'text' => $text,
            'attributes' => $attributes,
            'sort' => $sort
        ];
        return $this;
    }
    public function div($text = '', $attributes = [], $sort = 100)
    {
        $this->items[] = [
            'type' => 'div',
            'text' => $text,
            'attributes' => $attributes,
            'sort' => $sort
        ];
        return $this;

    }
    public function tag($tag, $text, $attributes = [], $sort = 100)
    {
        $this->items[] = [
            'type' => 'link',
            'tag' => $tag,
            'text' => $text,
            'attributes' => $attributes,
            'sort' => $sort

        ];
        return $this;

    }
    public function button($text, $attributes = [], $sort = 100)
    {
        $this->items[] = [
            'type' => 'button',
            'text' => $text,
            'attributes' => $attributes,
            'sort' => $sort
        ];
        return $this;

    }
    public function subMenu($text, $callback, $sort = 100)
    {
        $this->items[] = [
            'type' => 'subMenu',
            'text' => $text,
            'callback' => $callback,
            'sort' => $sort

        ];
        return $this;

    }
    public function attachMenu($targetId, $callback)
    {
        add_action(ADMIN_BUILDER_ATTACH_MENU . '_' . Str::Upper($targetId), function ($menu) use ($callback) {
            if ($callback) {
                $callback($menu);
            }
        });
        return $this;

    }
    public function wrapDiv($class, $id)
    {
        $this->warps[] = ['class' => $class, 'id' => $id];
        return $this;

    }
    protected function render()
    {
        foreach ($this->warps as $item) {
            echo "<div class='" . $item['class'] . "' id='" . $item['id'] . "' >";
        }
        foreach ($this->warps as $item) {
            echo "</div>";
        }
    }
}
