<?php

namespace Tests;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Spatie\Snapshots\MatchesSnapshots;

class TestCollection
{
    /**
     * @var \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public ResourceCollection $collection;
    public ?Request $request;
    public ?\Illuminate\Testing\TestResponse $TestResponse;
    /**
     * @var \Tests\TestCase|MatchesSnapshots
     */
    public ?TestCase $Testcase;

    public static function create(string $class, Collection $Links): TestCollection
    {
        return (new TestCollection())->setCollection(new $class($Links));
    }

    public function request()
    {
        class_exists($class = Str::replaceLast('Collection', '', get_class($this->collection())));
        class_exists($class = Str::replaceLast('Request', '', $class));
        if (!empty($class)) {
            $last = explode('\\', $class);
            $last = end($last);
            $class = '\\App\\Http\\Requests\\' . $last . 'Request';
            if (class_exists($class)) {
                $this->request = new $class();
            }
        }
        return $this->request;
    }

    public function setCollection(ResourceCollection $collection)
    {
        $this->collection = $collection;
        return $this;
    }

    public function collection(): ResourceCollection
    {
        return $this->collection;
    }

    public function data()
    {
        return $this->collection()->toResponse($this->request())->getData(true);
    }

    public function keys()
    {
        $data = $this->data();
        $arra = [];
        foreach ($data as $datum) {
            $arra[] = array_keys($datum);
        }
        return $arra;
    }

    public function getRouteKey()
    {
        return $this->collection()->getRouteKey();
    }

    public function post(TestCase $TestCase)
    {
        $this->Testcase = $TestCase;
        $this->TestResponse = $TestCase->json('post', $this->getRouteKey(), $this->request()->all())->assertStatus(Response::HTTP_OK);
        return $this;
    }

    public function assertJson()
    {
        return $this->TestResponse->assertJson($this->data());
    }

    public function assertJsonStructure()
    {
        $Test = $this->TestResponse;
        $data = $this->data();
        $collect = $Test->collect()->toArray();
        $classSnapshot = Str::replaceLast('Collection', 'Resource', get_class($this->collection()));
        $classResource = Str::replaceLast('Request', '', get_class($this->collection()));
        $classResource = Str::replaceLast('Collection', 'Resource', $classResource);


        foreach ($data as $k => $values) {
            $row = $collect[$k];


            foreach ($values as $key => $value) {
                $msg = "Класс управления снапшотом: {$classSnapshot}" . PHP_EOL;
                $msg .= "Класс управления данными: {$classResource}" . PHP_EOL;
                $msg .= "Структура ответа не соответствует ожидаемой. Отсутвуте ключ '{$key}' в массиве " . print_r($row, true) . PHP_EOL;
                $msg .= "Ожидаемый ответ " . print_r($values, true) . PHP_EOL;
                $this->Testcase->assertArrayHasKey($key, $row, $msg);
            }
        }

        return $this;
    }

    public function assertSnapshotKeys()
    {
        $Test = $this->TestResponse;
        $collect = $Test->collect();
        $data = $collect->first();
        $keys = array_keys($data);
        $this->Testcase->assertMatchesJsonSnapshot(jsoN_encode($keys));
    }
}
