<?php

namespace App\Controllers;

use App\Libraries\CronJob\Config\CronJob;
use App\Libraries\CronJob\Scheduler;

use CodeIgniter\CLI\CLI;

use App\Libraries\CronJob\JobRunner;

class Cron extends BaseController {


    /**
     * @param array $params
     */
    public function run(array $params = [])
    {

        CLI::newLine(1);
        CLI::write('**** Running Tasks... ****', 'white', 'blue');
        CLI::newLine(1);

        $scheduler = new Scheduler();
        $scheduler->call(function () {
            CLI::write('run scheduler', 'white', 'red');
            file_put_contents('test.txt', __METHOD__ . ' , date time : ' . date('Y-m-d H:i:s') . PHP_EOL, FILE_APPEND);

        })->everyMinute()->named('cron_controller_method');

        $cron_job = new CronJob();
        $cron_job->init($scheduler);

        $runner = new JobRunner($scheduler);
        $runner->run();

        CLI::newLine(1);
        CLI::write('**** Completed ****', 'white', 'green');
        CLI::newLine(1);
    }

}
