<?php

namespace App\Models;

use CodeIgniter\Model;

class recentUpdateModels extends Model
{
    protected $table = 'recent_updates';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'project_id', 'message', 'timestamp'];
    protected $useAutoIncrement = true;
    protected $useTimestamps = false;
}
