<?php

namespace App\Controllers;

use App\Libraries\CronJob\Config\CronJob;
use App\Libraries\CronJob\Scheduler;

use CodeIgniter\CLI\BaseCommand;
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
        //})->everyFifteenMinutes()->named('cron_controller_method');


        $cron_job = new CronJob();
        $cron_job->init($scheduler);

        $runner = new JobRunner();

        $runner->run();

        CLI::newLine(1);
        CLI::write('**** Completed ****', 'white', 'green');
        CLI::newLine(1);
    }


    public function run_test()//Scheduler $schedule
    {

        echo 'run method!!!';
        file_put_contents('test.txt', ' , date time : ' . date('Y-m-d H:i:s') . PHP_EOL, FILE_APPEND);
        $schedule = new Scheduler();

        /* echo 'File: '.__FILE__.' --> Line : '.__LINE__;
         echo'<pre>';
         print_r(get_class_methods($schedule));
         echo'</pre>';*/


        $schedule->call(function () {
            echo 'run Scheduler!!!';
            file_put_contents('test.txt', __METHOD__ . ' , date time : ' . date('Y-m-d H:i:s') . PHP_EOL, FILE_APPEND);

        })->everyMinute()->named('cron_method');

        /* $schedule->shell('cron_method');

         $schedule->command('cron_method');*/


    }


    public function test()
    {
        echo __METHOD__ . ' , date :' . date('Y-m-d H:i:s');
    }
}
