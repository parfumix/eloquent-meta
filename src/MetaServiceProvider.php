<?php

namespace Eloquent\Meta;

use Illuminate\Support\ServiceProvider;
use Flysap\Support;

class MetaServiceProvider extends ServiceProvider {

    /**
     * Publish resources.
     */
    public function boot() {
        $this->publishes([
            __DIR__ . DIRECTORY_SEPARATOR . '../migrations/' => base_path('database/migrations')
        ], 'migrations');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() { }
}