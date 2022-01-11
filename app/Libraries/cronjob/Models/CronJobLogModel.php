<?php

namespace App\Libraries\CronJob\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use CodeIgniter\Validation\ValidationInterface;

class CronJobLogModel extends Model {
    protected $DBGroup = 'default';
    protected $table = 'cronjob';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = TRUE;
    protected $returnType = 'object';
    protected $useSoftDeletes = TRUE;
    protected $allowedFields = ['name', 'type', 'action', 'environment', 'output', 'error', 'start_at', 'end_at', 'duration', 'test_time'];
    protected $useTimestamps = TRUE;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = FALSE;

    public function __construct(?ConnectionInterface &$db = NULL, ?ValidationInterface $validation = NULL)
    {
        parent::__construct($db, $validation);
    }

    public function setTableName($tableName)
    {
        $this->table = $tableName;
    }
}
