<?php

namespace Shuaau\SimpleViewable;

use Illuminate\Support\ServiceProvider;

class SimpleViewableServiceProvider extends ServiceProvider {

    public function boot() {
        $this->publishes([
            __DIR__.'/Publish/migrations/2020_09_23_203811_create_viewables_table.php' => database_path('/migrations/2020_09_23_203811_create_viewables_table.php')
        ]);
    }

    public function register() {
        $this->app->bind('SimpleViewable', function () {
            return new SimpleViewable();
        });
    }

}
