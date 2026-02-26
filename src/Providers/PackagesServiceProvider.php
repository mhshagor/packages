<?php

namespace Mhshagor\Package\Providers;

use Illuminate\Support\ServiceProvider;

class PackagesServiceProvider extends ServiceProvider {
    public function register(): void {
        // Register image-picker service provider
        $this->app->register(\Mhshagor\ImagePicker\Providers\ImagePickerServiceProvider::class);
        $this->app->register(\Mhshagor\Accordion\Providers\AccordionServiceProvider::class);
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
