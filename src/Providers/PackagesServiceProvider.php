<?php

namespace Mhshagor\LaravelComponents\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\File;

class PackagesServiceProvider extends ServiceProvider
{
    protected $basePath = __DIR__ . '/../../';

    protected $packages = [
        'components',
    ];
    
    private function publishPackage($package)
    {
        if($package === 'all') {
            $this->publishAll();
            return;
        }
        $paths = match($package) {
            'components' => $this->publishComponents($package),
            
            default => throw new \Exception("Unknown package: {$package}"),
        };
        
        $this->publishes($paths, $package);
    }

    private function publishAll()
    {
        $paths = [
            ...$this->publishComponents('components'),
        ];
        
        $this->publishes($paths, 'all');
    }

    private function publishComponents($package)
    {
        return [
            $this->basePath . '/components' => resource_path('views/components'),
            $this->basePath . '/asset/js' => resource_path('js/sgd'),
            $this->basePath . '/asset/css' => resource_path('css/sgd'),
            $this->basePath . '/demo' => resource_path('views/sgd'),
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
