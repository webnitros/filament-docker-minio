<?php
/**
 * Created by Andrey Stepanenko.
 * User: webnitros
 * Date: 14.07.2023
 * Time: 20:37
 */

namespace App\Helpers;

use App\Models\Build;
use App\Models\Service;

class CollectionLoad
{
    public function remoteTasks(\App\Models\Project $project, string $key = 'external_id')
    {
        return $project->remoteTasks()->withTrashed()->get()->where('project_id', $project->id)->keyBy($key);
    }

    public function builds(Service $Service, string $key = 'external_id')
    {
        return $Service->builds()->withTrashed()->get()->where('service_id', $Service->id)->keyBy($key);
    }

    public function branches(Build $Build, string $key = 'name')
    {
        return $Build->branches()->withTrashed()->get()->keyBy($key);
    }

    public function logs(Build $Build, string $key = 'teamcity_id')
    {
        return $Build->logs()->withTrashed()->get()->keyBy($key);
    }

    public function projects(string $key = 'teamcity_id')
    {
        return \App\Models\Project::get()->keyBy($key);
    }
}
