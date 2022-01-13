<?php namespace Config;


use App\Libraries\CronJob\Scheduler;

class CronJob {
    /**
     * Directory
     */
    public $FilePath = WRITEPATH . 'cronJob/';

    /**
     * Filename setting
     */
    public $FileName = 'jobs';

    /**
     * Set true if you want save logs
     */
    public $logPerformance = FALSE;

    /*
    |--------------------------------------------------------------------------
    | Log Saving Method
    |--------------------------------------------------------------------------
    |
    | Set to specify the REST API requires to be logged in
    |
    | 'file'   Save in file
    | 'database'  Save in database
    |
    */
    public $logSavingMethod = 'file';

    /*
    |--------------------------------------------------------------------------
    | Database Group
    |--------------------------------------------------------------------------
    |
    | Connect to a database group for logging, etc.
    |
    */
    public $databaseGroup = 'default';

    /*
    |--------------------------------------------------------------------------
    | Cronjob Table Name
    |--------------------------------------------------------------------------
    |
    | The table name in your database that stores cronjobs
    |
    */
    public $tableName = 'cronjob';


    /*
    |--------------------------------------------------------------------------
	| Cronjobs
	|--------------------------------------------------------------------------
    |
	| Register any tasks within this method for the application.
	| Called by the TaskRunner.
	|
	| @param Scheduler $schedule
	*/
    public function init(Scheduler $schedule)
    {
        $schedule->call(function () {

            file_put_contents('text.txt', 'test data time ' . date('Y-m-d H:i:s') . PHP_EOL, FILE_APPEND);

        })->daysOfMonth()->named('foo');
        //})->everyMinute()->named('foo');


    }
}