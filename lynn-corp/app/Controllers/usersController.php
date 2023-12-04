<?php

namespace App\Controllers;

use App\Models\projectsModels;
use App\Models\usersModels;
use CodeIgniter\Controller;

class usersController extends Controller
{
    public function login()
    {
        $this->checkCookies();
        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $remember = $this->request->getVar('remember');

            $userModel = new usersModels();
            $user = $userModel->where('username', $username)->first();

            if ($user && password_verify($password, $user['password'])) {
                session()->set('user_id', $user['id']);
                session()->set('user_role', $user['role']);
                session()->set('user_fn', $user['name']);

                if ($remember) {
                    $expiration = time() + 7 * 24 * 3600;
                    setcookie('user_id', $user['id'], $expiration);
                    setcookie('user_role', $user['role'], $expiration);
                }

                if ($user['role'] == 'Client') {
                    return redirect()->to('/home')->with('success', 'Login successful');
                } else {
                    return redirect()->to('/dashboard')->with('success', 'Login successful');
                }
            } else {
                return redirect()->back()->withInput()->with('error', 'Invalid email or password');
            }
        }

        return view('loginsignup');
    }

    public function signup()
    {
        if ($this->request->getMethod() === 'post') {
            $name = $this->request->getVar('name');
            $username = $this->request->getVar('suusername');
            $password = $this->request->getVar('supassword');
            $confirmPassword = $this->request->getVar('supassword_confirm');

            if ($password !== $confirmPassword) {
                return redirect()->to('/register')->withInput()->with('error', 'Password and confirm password do not match');
            }

            $userModel = new usersModels();
            $userData = [
                'name' => $name,
                'username' => $username,
                'password' => password_hash($password, PASSWORD_BCRYPT),
            ];
            $userModel->insert($userData);
            $user = $userModel->where('username', $username)->first();

            session()->set('user_id', $user['id']);
            session()->set('user_role', $user['role']);
            session()->set('user_fn', $user['name']);
            $this->setTheme('Light');

            if ($user['role'] == 'Client') {
                return redirect()->to('/home')->with('success', 'Login successful');
            } else {
                return redirect()->to('/dashboard')->with('success', 'Login successful');
            }
        }

        return view('loginsignup');
    }


    public function profile()
    {
        $userId = session()->get('user_id');
        $userRole = session()->get('user_role');
        $userModel = new usersModels();
        $user = $userModel->find($userId);

        return view('profile', ['user' => $user, 'userRole' => $userRole]);
    }

    public function update($id)
    {
        $name = $this->request->getVar('name');
        $password = $this->request->getVar('password');

        $userModel = new usersModels();
        $userData = [
            'name' => $name,
            'password' => $password,
        ];

        $userModel->update($id, $userData);

        return redirect()->to('/profile')->with('success', 'Profile updated successfully');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login')->with('success', 'Logout successfully');
    }

    public function delete($id)
    {
        $userModel = new usersModels();
        $userModel->delete($id);

        session()->destroy();

        return redirect()->to('/')->with('success', 'Your account has been deleted');
    }

    private function getLastProjectName($projectModel, $userId)
    {
        $latestProject = $projectModel
            ->join('users', 'projects.user_id = users.id')
            ->select('projects.project_name')
            ->where('users.id', $userId)
            ->orderBy('projects.created_at', 'DESC')
            ->first();

        if ($latestProject === null) {
            return '-';
        }

        return $latestProject['project_name'];
    }

    public function clientFetch()
    {
        $userModel = new usersModels();
        $projectModel = new projectsModels();

        $clients = $userModel->where('role', 'Client')->findAll();
        $data = [];

        foreach ($clients as $client) {
            $clientData = [
                'name' => $client['name'],
                'project_name' => $this->getLastProjectName($projectModel, $client['id']),
            ];

            if ($clientData['project_name'] === null) {
                $clientData['project_name'] = '-';
            }

            $data[] = $clientData;
        }

        return $this->response->setJSON($data);
    }

    public function devFetch()
    {
        $userModel = new usersModels();

        $developers = $userModel->where('role', 'Developer')->findAll();
        $data = [];

        foreach ($developers as $developer) {
            $developerData = [
                'name' => $developer['name'],
                'id'   => $developer['id'],
            ];


            $data[] = $developerData;
        }

        return $this->response->setJSON($data);
    }

    public function fireDev()
    {
        $data = [
            'id' => $this->request->getVar('id'),
        ];

        $usersModels = new usersModels();

        $id = $data['id'];

        $usersModels->delete($id);

        return $this->response->setJSON(['message' => 'Dev Fired successfully']);
    }

    public function checkCookies()
    {
        if (isset($_COOKIE['user_id']) && !empty($_COOKIE['user_id'])) {
            $id = $_COOKIE['user_id'];

            $userModel = new usersModels();
            $user = $userModel->where('id', $id)->first();

            session()->set('user_id', $user['id']);
            session()->set('user_role', $user['role']);
            session()->set('user_fn', $user['name']);

            if ($user['role'] == 'Client') {
                return redirect()->to('/home')->with('success', 'Login successful');
            } else {
                return redirect()->to('/dashboard')->with('success', 'Login successful');
            }
        } else {
        }
    }

    public function checkTheme()
    {
        $theme = $_COOKIE['theme'] ?? 'Light';

        return $this->response->setJSON(['theme' => $theme]);
    }

    public function setTheme($theme)
{
    $expiration = time() + 7 * 24 * 3600;
    if (setcookie('theme', $theme, $expiration, '/')) {
        echo 'Cookie set successfully';
    } else {
        echo 'Cookie setting failed';
    }
}

}
