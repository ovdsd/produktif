<?php

namespace App\Models;

use CodeIgniter\Model;

class projectsModels extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';

    protected $allowedFields = ['project_name', 'project_id', 'payment_status', 'project_status', 'user_id', 'user_id2'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $returnType = 'array';
}
