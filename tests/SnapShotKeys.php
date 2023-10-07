<?php

namespace Tests;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Spatie\Snapshots\MatchesSnapshots;

trait  SnapShotKeys
{

    /**
     * Делает снапшот с ключами
     * @param array $data
     * @return void
     */
    public function assertMatchesJsonSnapshotKeys(array $data)
    {
        $keys = $this->array_keys_recursive($data);
        $this->assertMatchesJsonSnapshot($keys);
    }

    function array_keys_recursive($array)
    {
        $keys = [];

        foreach ($array as $key => $value) {
            if ($key != 0) {
                $keys[] = $key;
            }
            if (is_array($value)) {
                $keys = array_merge($keys, $this->array_keys_recursive($value));
            }
        }

        return $keys;
    }
}
