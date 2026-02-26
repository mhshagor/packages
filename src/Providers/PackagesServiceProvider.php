<?php

namespace Mhshagor\Package\Providers;

use Illuminate\Support\ServiceProvider;

class PackagesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Service providers will be auto-discovered from composer.json extra section
    }

    public function boot(): void
    {
        $imagePicker = [
            __DIR__ . '/../../image-picker/components' => resource_path('views/components/sgd'),
            __DIR__ . '/../../image-picker/js' => resource_path('js/sgd'),
            __DIR__ . '/../../image-picker/css' => resource_path('css/sgd'),
        ];
        $this->publishes([
            ...$imagePicker,
        ], 'image-picker');

        $accordion = [
            __DIR__ . '/../../accordion/components' => resource_path('views/components/sgd'),
            __DIR__ . '/../../accordion/js' => resource_path('js/sgd'),
            __DIR__ . '/../../accordion/css' => resource_path('css/sgd'),
        ];
        $this->publishes([
            ...$accordion,
        ], 'accordion');

        $this->publishes([
            ...$imagePicker,
            ...$accordion,
        ], 'packages');
    }
}
