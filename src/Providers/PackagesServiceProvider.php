<?php

namespace Mhshagor\LaravelComponents\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\File;

class PackagesServiceProvider extends ServiceProvider
{
    protected $basePath = __DIR__ . '/../../';

    protected $packages = [
        'file-picker',
        'components',
    ];
    
    private function publishPackage($package)
    {
        if($package === 'all') {
            $this->publishAll();
            return;
        }
        $paths = match($package) {
            'file-picker' => $this->publishFilePicker($package),
            'components' => $this->publishComponents($package),
            
            default => throw new \Exception("Unknown package: {$package}"),
        };
        
        $this->publishes($paths, $package);
    }

    private function publishAll()
    {
        $paths = [
            ...$this->publishFilePicker('file-picker'),
            ...$this->publishComponents('components'),
        ];
        
        $this->publishes($paths, 'all');
    }

    private function publishFilePicker($package)
    {
        return [
            $this->basePath . $package . '/demo' => resource_path('views/sgd'),
            $this->basePath . $package . '/components' => resource_path('views/components/sgd'),
            $this->basePath . $package . '/js' => resource_path('js/sgd'),
            $this->basePath . $package . '/css' => resource_path('css/sgd'),
        ];
    }

    private function publishComponents($package)
    {
        return [
            $this->basePath . '/components' => resource_path('views/components'),
            $this->basePath . '/assets/js' => resource_path('js/sgd'),
            $this->basePath . '/assets/css' => resource_path('css/sgd'),
            $this->basePath . '/demo' => public_path('sgd'),
        ];
    }    

    public function boot()
    {
        foreach ($this->packages as $package) {
            $this->publishPackage($package);
        }
        $this->publishAll();
    }
    
    public function register()
    {
        // Components will be auto-discovered via Laravel's component discovery
    }
}
