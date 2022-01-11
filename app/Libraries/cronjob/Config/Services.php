<?php namespace App\Libraries\CronJob\Config;

use App\Libraries\CronJob\CronExpression;
use Config\Services as BaseServices;
use App\Libraries\CronJob\Scheduler;

class Services extends BaseServices {
    /**
     * Returns the Task Scheduler
     *
     * @param boolean $getShared
     *
     * @return \App\Libraries\CronJob\Scheduler
     */
    public static function scheduler(bool $getShared = TRUE): Scheduler
    {
        if ($getShared)
        {
            return static::getSharedInstance('scheduler');
        }

        return new Scheduler();
    }

    /**
     * Returns the CronExpression class.
     *
     * @param boolean $getShared
     *
     * @return \App\Libraries\CronJob\CronExpression
     */
    public static function cronExpression(bool $getShared = TRUE): CronExpression
    {
        if ($getShared)
        {
            return static::getSharedInstance('cronExpression');
        }

        return new CronExpression();
    }
}
