<?php
/**
 * Created by Andrey Stepanenko.
 * User: webnitros
 * Date: 05.05.2023
 * Time: 16:57
 */

namespace App\Facades;


use App\Models\Build;
use App\Models\Service;
use Illuminate\Support\Facades\Facade;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class ArticleCollection
 * @package App\Facades
 * @method static \App\Models\Log|Collection remoteTasks(\App\Models\Project $project, string $key = 'external_id')
 * @method static \App\Models\Log|Collection builds(Service $Site, string $key = 'external_id')
 * @method static \App\Models\Branch|Collection branches(Build $Build, string $key = 'name')
 * @method static \App\Models\Log|Collection logs(Build $Build, string $key = 'teamcity_id')
 * @method static \App\Models\Project|Collection projects(string $key = 'teamcity_id')
 *
 * @see \App\Helpers\CollectionLoad
 */
class CollectionLoad extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'collection_load';
    }
}
