<?php

namespace ActivismeBE\ActiveMenu;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

/**
 * Class ActiveMenuServiceProvider
 *
 * @package ActivismeBE\ActiveMenu
 */
class ActiveMenuServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('activisme_active_menu', function () {
            return new ActiveMenu;
        });

        Blade::directive('activate', function ($expression) {
            $expression = $this->addParenthesis($expression);
            return "<?php echo app('activisme_active_menu')->activate{$expression} ?>";
        });

        Blade::directive('active', function ($expression) {
            $expression = $this->addParenthesis($expression);
            return "<?php echo app('activisme_active_menu')->active{$expression} ?>";
        });
    }

    /**
     * Add parenthesis to an expression.
     *
     * @param  string $expression
     * @return string
     */
    protected function addParenthesis($expression)
    {
        return starts_with($expression, '(') ? $expression : "($expression)";
    }
}