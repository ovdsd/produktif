<?php

namespace App\Models;

use CodeIgniter\Model;

class projectsCounterModels extends Model
{
    protected $table = 'project_counters';
    protected $primaryKey = 'project_type';
    protected $allowedFields = ['project_type', 'counter'];
}
