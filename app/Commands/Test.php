<?php

namespace App\Commands;

use App\Libraries\CronJob\Scheduler;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class Test extends BaseCommand
{
    /**
     * The Command's Group
     *
     * @var string
     */
    protected $group = 'test_group';

    /**
     * The Command's Name
     *
     * @var string
     */
    protected $name = 'command:name';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = '';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'command:name [arguments] [options]';

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [];

    /**
     * The Command's Options
     *
     * @var array
     */
    protected $options = [];

    /**
     * Actually execute a command.
     *
     * @param array $params
     */
    public function run(array $params)
    {
        echo 'Run baby run:)';
        $schedule = new Scheduler();
        $schedule->call(function () {
            echo 'run Scheduler!!!';
            file_put_contents('test.txt', __METHOD__ . ' , date time : ' . date('Y-m-d H:i:s') . PHP_EOL, FILE_APPEND);

        })->everyMinute()->named('cron_method');
    }
}
