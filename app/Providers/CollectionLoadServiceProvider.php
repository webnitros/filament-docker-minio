<?php
/**
 * Created by Andrey Stepanenko.
 * User: webnitros
 * Date: 05.05.2023
 * Time: 16:57
 */

namespace App\Providers;

use App\Helpers\CollectionLoad;
use Illuminate\Support\ServiceProvider;

class CollectionLoadServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('collection_load', function () {
            return new CollectionLoad();
        });
    }
}
