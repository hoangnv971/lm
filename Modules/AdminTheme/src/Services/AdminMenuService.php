<?php

namespace Modules\AdminTheme\Services;


use Illuminate\Support\Arr;


class AdminMenuService 
{
    protected $router;
    protected $currentUri;
    static protected $menuItems = [];
    private $isActive = false;

    public function __construct()
    {
        self::$menuItems = config('admin.menu');
    }

    public function getMenuItems()
    {
        return self::$menuItems;
    }

    public function setItem(array $item)
    {
        Arr::add(self::$menuItems, $item['route'], [
            'route' => $item['route'],
            'name' => $item['name'] ?? '',
            'childrens' => $item['childrens'] ?? false,
            'classIcon' => $item['classIcon'] ?? false,
            'className' => $item['className'] ?? '',
            'orderBy' => $item['orderBy'] ?? 0,
        ]);

        return $this;
    }

    public function getItemByName(String $name)
    {
        return Arr::where(self::$menuItems, function($item) use ($name){
            return $item['name'] == $name;
        });
    }

    public function mergeItems(Array $items)
    {
        self::$menuItems = array_merge(self::$menuItems, $items);
        return $this;
    }

    protected function sortMenu()
    {
        self::$menuItems = Arr::sort(self::$menuItems, function(array $item){
            return $item['sortOrder'];
        });
        return $this;
    }

    public function mergeRecursive(Array $items)
    {
        self::$menuItems = array_merge_recursive(self::$menuItems, $items);
       return $this; 
    }

    public function toHtml()
    {
        $html = "";
        $this->sortMenu();
        foreach (self::$menuItems as $item) {
            $html.= $this->getItemNode($item); 
            $this->isActive = false;
        }   
        return $html;
    }

    protected function getItemNode($item){
        $htmlChildrens = '';
        if($item['childrens']){
            $htmlChildrens = $this->getHtmlChilrenItems($item['childrens']);
        }
        return $this->getHtmlItem($item, $htmlChildrens);
    }

    protected function getHtmlChilrenItems($items){
        $html = '';

        foreach($items as $item){
            $html .= $this->getHtmlItem($item);
        }
        $html = $this->setWrapUlItems($html);
        return $html;
    }

    protected function getHtmlItem($item, $children = false){
        $route = $item['route'] ? route($item['route'], [], false) : '#';
        $iconClass = $item['iconClass'];
        $name = $item['name'];
        $activeClass = $this->getActiveClass($route);
        $openTabClass = $this->getOpenTabClass($children);
        $className = $item['className']." ".$activeClass;
        $html = "
            <li class='nav-item $openTabClass'> 
                <a href='$route' class='nav-link $className'> <i class='$iconClass'></i>
                    <p>$name
                    </p>
                </a> 
                $children
            </li>
        ";

       return $html;
    }

    protected function getOpenTabClass($children){
        return $children && $this->isActive ? 'menu-open' : '';        
    }
    
    protected function getActiveClass($uri){
        $activeClass = '';
        if($uri != '#' && $this->checkIsCurrent($uri)){
            $activeClass = 'active';
            $this->isActive = true;
        }
        return $activeClass;
    }

    protected function checkIsCurrent($uri){
        $uri = trim($uri, '/');
        return request()->is($uri);
    }

    protected function setWrapUlItems($htmlItems){
        return "<ul class='nav nav-treeview'>
            $htmlItems
        </ul>";
    }
}