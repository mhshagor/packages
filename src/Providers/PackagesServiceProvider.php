<?php

namespace Mhshagor\Package\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\File;

class PackagesServiceProvider extends ServiceProvider
{
    protected $basePath = __DIR__ . '/../../';

    protected $packages = [
        'file-picker',
        'accordion',
    ];
    
    private function publishPackage($package)
    {
        if($package === 'all') {
            $this->publishAll();
            return;
        }
        $paths = match($package) {
            'file-picker' => $this->publishFilePicker($package),
            'accordion' => $this->publishAccordion($package),
            default => throw new \Exception("Unknown package: {$package}"),
        };
        
        $this->publishes($paths, $package);
    }

    private function publishAll()
    {
        $paths = [
            ...$this->publishFilePicker('file-picker'),
            ...$this->publishAccordion('accordion'),
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

    private function publishAccordion($package)
    {
        return [
            $this->basePath . $package . '/demo' => resource_path('views/sgd'),
            $this->basePath . $package . '/components' => resource_path('views/components/sgd'),
            $this->basePath . $package . '/js' => resource_path('js/sgd'),
            $this->basePath . $package . '/css' => resource_path('css/sgd'),
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
