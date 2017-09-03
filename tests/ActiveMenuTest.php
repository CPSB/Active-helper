<?php

use ActivismeBE\ActiveMenu\ActiveMenu;
use Illuminate\View\Compilers\BladeCompiler;

class ActiveMenuTest extends TestCase
{
    public function test_binding()
    {
        $this->assertInstanceOf(ActiveMenu::class, app('activisme_active_menu'));
    }

    public function test_activate_menu()
    {
        $activeMenu = new ActiveMenu;
        $activeMenu->activate('active-menu');

        $this->assertNull($activeMenu->active('inactive-menu'));
        $this->assertEquals('active', $activeMenu->active('active-menu'));
        $this->assertEquals('custom-class', $activeMenu->active('active-menu', 'custom-class'));
    }

    public function test_activate_parents()
    {

    }


}