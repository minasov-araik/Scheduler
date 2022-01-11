<?php

namespace App\Libraries\CronJob\Cron;

interface FieldFactoryInterface
{
    public function getField(int $position): FieldInterface;
}
