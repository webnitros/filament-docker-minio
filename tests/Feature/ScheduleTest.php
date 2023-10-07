<?php
/**
 * Created by Andrey Stepanenko.
 * User: webnitros
 * Date: 27.09.2023
 * Time: 11:55
 */

namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ScheduleTest extends TestCase
{
    /** @test */
    public function main(): void
    {
        // Проверят что список заданий валидный
        Artisan::call('schedule:list');

        /** @var \Illuminate\Console\Scheduling\Schedule $schedule */
        $schedule = app()->make(\Illuminate\Console\Scheduling\Schedule::class);

        $events = collect($schedule->events());
        $this->assertTrue($events->contains(function ($event) {
            return strripos($event->command, 'ping:site');
        }));

    }

}
