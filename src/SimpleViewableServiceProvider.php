<?php

namespace Shuaau\SimpleViewable;

use Illuminate\Support\ServiceProvider;

class SimpleViewableServiceProvider extends ServiceProvider {

    public function boot() {
        $this->loadMigrationsFrom(__DIR__.'/Publish/migrations');
    }

    public function register() {
        $this->app->bind('SimpleViewable', function () {
            return new SimpleViewable();
        });
    }

}
