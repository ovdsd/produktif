<?php

namespace App\Controllers;

use App\Models\projectsCounterModels;

class projectsCounterController extends BaseController
{
    public function getProjectCounter($projectType)
    {
        $projectCountersModel = new projectsCounterModels();
        $counter = $projectCountersModel->where('project_type', $projectType)->first();

        if (!$counter) {
            throw new \RuntimeException('Invalid project type');
        }

        $newCounter = $counter['counter'] + 1;
        $this->updateProjectCounter($counter['project_type'], $newCounter);

        return $this->response->setJSON([
            'project_type' => $projectType,
            'counter' => $newCounter,
        ]);
    }

    private function updateProjectCounter($projectType, $newCounter)
    {
        $projectCountersModel = new projectsCounterModels();
        $projectCountersModel
            ->set(['counter' => $newCounter])
            ->where('project_type', $projectType)
            ->update();
    }
}
