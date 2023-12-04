<?php

namespace App\Controllers;

use App\Models\recentUpdateModels;

class recentUpdatesController extends BaseController
{
    public function index()
    {
        $recentUpdatesModel = new recentUpdateModels();
        $updates = $recentUpdatesModel->findAll();

        return json_encode($updates);
    }

    public function create()
    {
        $recentUpdatesModel = new recentUpdateModels();

        $data = [
            'name' => $this->request->getVar('name'),
            'project_id' => $this->request->getVar('project_id'),
            'message' => $this->request->getVar('message'),
            'timestamp' => date('Y-m-d H:i:s'),
        ];

        $result = $recentUpdatesModel->insert($data);

        if ($result) {
            return json_encode(['message' => 'Recent update created successfully']);
        } else {
            return json_encode(['message' => 'Failed to create recent update']);
        }
    }
}
