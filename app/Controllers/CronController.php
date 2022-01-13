<?php

namespace App\Controllers;

use App\Libraries\CronJob\Config\CronJob;
use App\Libraries\CronJob\Scheduler;

use App\Libraries\CronJob\JobRunner;

class CronController extends BaseController {


    /**
     * @param array $params
     */
    public function run()
    {
        $scheduler = new Scheduler();
        $scheduler->call(function () {
            file_put_contents('test.txt', __METHOD__ . ' , date time : ' . date('Y-m-d H:i:s') . PHP_EOL, FILE_APPEND);

        })->everyMinute()->named('cron_controller_method');

        $cron_job = new CronJob();
        $cron_job->init($scheduler);
        $runner = new JobRunner($scheduler);
        $runner->run();
    }

}
