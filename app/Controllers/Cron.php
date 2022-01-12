<?php

namespace App\Controllers;

use App\Libraries\CronJob\Scheduler;

class Cron extends BaseController {
    public function run()//Scheduler $schedule
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
        file_put_contents('test.txt', __METHOD__ . ' , date time : ' . date('Y-m-d H:i:s') . PHP_EOL, FILE_APPEND);
    }
}
