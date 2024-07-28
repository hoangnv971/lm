<?php

namespace Modules\AdminTheme\View\Components\Layouts;

use Illuminate\View\Component;
use Illuminate\View\View;

class Aside extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view/contents that represent the component.
     */
    public function render(): View|string
    {
        $menuItems = app("admin.menu");
        return view('admintheme::components.layouts.aside', compact('menuItems', ));
    }
}
