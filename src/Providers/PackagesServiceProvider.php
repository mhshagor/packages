<?php

namespace Mhshagor\Package\Providers;

use Illuminate\Support\ServiceProvider;

class PackagesServiceProvider extends ServiceProvider
{
    protected $basePath = __DIR__ . '/../../';

    protected $packages = [
        'image-picker',
        'accordion',
    ];
    
    private function publishPackage($package)
    {
        if($package === 'all') {
            $this->publishAll();
            return;
        }
        $paths = match($package) {
            'image-picker' => $this->publishImagePicker($package),
            'accordion' => $this->publishAccordion($package),
            default => throw new \Exception("Unknown package: {$package}"),
        };
        
        $this->publishes($paths, $package);
    }

    private function publishAll()
    {
        $paths = [
            ...$this->publishImagePicker('image-picker'),
            ...$this->publishAccordion('accordion'),
        ];
        
        $this->publishes($paths, 'all');
    }

    private function publishImagePicker($package)
    {
        return [
            $this->basePath . $package . '/components' => resource_path('views/components/sgd'),
            $this->basePath . $package . '/js' => resource_path('js/sgd'),
            $this->basePath . $package . '/css' => resource_path('css/sgd'),
        ];
    }

    private function publishAccordion($package)
    {
        return [
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
}
