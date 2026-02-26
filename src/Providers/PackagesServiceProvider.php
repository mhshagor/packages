<?php

namespace Mhshagor\Package\Providers;

use Illuminate\Support\ServiceProvider;

class PackagesServiceProvider extends ServiceProvider {
    public function register(): void {
        // Service providers will be auto-discovered from composer.json extra section
    }

    public function boot(): void {
        $this->publishes([
            __DIR__.'/../../image-picker/resources/views/components' => resource_path('views/components/sgd'),
            __DIR__.'/../../image-picker/resources/js' => resource_path('js/sgd'),
            __DIR__.'/../../image-picker/resources/css' => resource_path('css/sgd'),
        ], 'image-picker');

        $this->publishes([
            __DIR__.'/../../accordion/resources/views/components' => resource_path('views/components/sgd'),
            __DIR__.'/../../accordion/resources/js' => resource_path('js/sgd'),
            __DIR__.'/../../accordion/resources/css' => resource_path('css/sgd'),
        ], 'accordion');
    }
}
