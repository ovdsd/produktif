<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\projectsModels;

class projectsController extends Controller
{
    public function index()
    {
        $projectModel = new projectsModels();
        $projects = $projectModel->findAll();

        return $this->response->setJSON($projects);
    }

    public function show($id)
    {
        $projectModel = new projectsModels();
        $project = $projectModel->find($id);

        if ($project === null) {
            return redirect()->to('/projects')->with('error', 'Project not found');
        }

        return view('projects/show', ['project' => $project]);
    }

    public function create()
    {
        return view('projects/create');
    }

    public function store()
    {
        $projectName = $this->request->getVar('project_name');
        $projectId = $this->request->getVar('project_id');
        $userId = $this->request->getVar('user_id');

        $projectModel = new projectsModels();
        $projectData = [
            'project_name' => $projectName,
            'project_id' => $projectId,
            'user_id'   => $userId,
        ];

        $projectModel->insert($projectData);

        return $this->response->setJSON(['message' => 'Project paid successfully']);
    }

    public function edit($id)
    {
        $projectModel = new projectsModels();
        $project = $projectModel->find($id);

        if ($project === null) {
            return redirect()->to('/projects')->with('error', 'Project not found');
        }

        return view('projects/edit', ['project' => $project]);
    }

    public function update($id)
    {
        $name = $this->request->getVar('name');
        $paymentStatus = $this->request->getVar('payment_status');
        $projectStatus = $this->request->getVar('project_status');

        $projectModel = new projectsModels();
        $projectData = [
            'name' => $name,
            'payment_status' => $paymentStatus,
            'project_status' => $projectStatus,
        ];

        $projectModel->update($id, $projectData);

        return redirect()->to('/projects')->with('success', 'Project updated successfully');
    }

    public function delete($id)
    {
        $projectModel = new projectsModels();
        $projectModel->delete($id);

        return redirect()->to('/projects')->with('success', 'Project deleted successfully');
    }

    public function projectFetch()
    {
        $projectModel = new projectsModels();
        $userID = session()->get('user_id');

        $projects = $projectModel->where('user_id', $userID)->findAll();
        $data = [];

        foreach ($projects as $project) {
            $projectData = [
                'project_name' => $project['project_name'],
                'project_id' => $project['project_id'],
                'payment_status' => $project['payment_status'],
                'project_status' => $project['project_status'],
            ];

            if ($projectData['project_name'] === null) {
                $projectData['project_name'] = '-';
            }

            $data[] = $projectData;
        }

        return $this->response->setJSON($data);
    }

    public function updatePayment()
    {
        $data = [
            'projectId' => $this->request->getVar('projectId'),
            'newStatus' => $this->request->getVar('newStatus'),
        ];

        $projectsModel = new projectsModels();
        $project = $projectsModel->where('project_id', $data['projectId'])->first();

        if (!$project) {
            return $this->response->setJSON(['message' => 'Project not found'], 404);
        }

        $id = $project['id'];

        if ($data['newStatus'] == 'Paid') {
            $projectData = [
                'payment_status' => 'Paid',
            ];
        } else {
            $projectData = [
                'payment_status' => 'Cancel',
                'project_status' => 'Cancel',
            ];
        }

        $projectsModel->update($id, $projectData);

        return $this->response->setJSON(['message' => 'Project paid successfully']);
    }

    public function updateProject()
    {
        $data = [
            'projectId' => $this->request->getVar('projectId'),
            'newStatus' => $this->request->getVar('newStatus'),
        ];

        $projectsModel = new projectsModels();
        $project = $projectsModel->where('project_id', $data['projectId'])->first();


        if (!$project) {
            return $this->response->setJSON(['message' => 'Project not found'], 404);
        }

        $id = $project['id'];

        if ($data['newStatus'] == 'Ongoing') {
            $projectData = [
                'project_status' => $data['newStatus'],
            ];
        } else {
            $projectData = [
                'project_status' => $data['newStatus'],
                'user_id2' => session() -> get('user_id'),
            ];
        }

        $projectsModel->update($id, $projectData);

        return $this->response->setJSON(['message' => 'Project paid successfully']);
    }
}
