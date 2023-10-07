<?php
/**
 * Created by Andrey Stepanenko.
 * User: webnitros
 * Date: 05.05.2023
 * Time: 16:57
 */

namespace App\Providers;

use App\Helpers\Project;
use Illuminate\Support\ServiceProvider;

class ProjectServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('project', function () {
            return new Project();
        });
    }
}
