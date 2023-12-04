<?php

namespace App\Controllers;

use App\Models\usersModels;

use function PHPUnit\Framework\isEmpty;

class Home extends BaseController
{
    public function index()
    {
        if (session()->get('user_id') == NULL) {
            $this->checkCookies();
        }

        $session = session()->get('user_fn');

        if ($session != NULL) {
            return view('home');
        } else {
            return redirect()->to('/login')->with('failed', 'Login First');
        }

        if (isset($_COOKIE['user_id'])) {
            $userRole = $_COOKIE['user_role'] ?? null;
            if ($userRole == 'Client') {
                return redirect()->to('/home');
            } else {
                return redirect()->to('/dashboard');
            }
        }
    }

    public function dashboard()
    {
        if (session()->get('user_id') == NULL) {
            $this->checkCookies();
        }
        
        $session = session()->get('user_fn');
        $role = session()->get('user_role');
        if ($session != NULL) {
            if ($role == 'Client') {
                session()->destroy();
                return redirect()->to('/login')->with('notallowed', 'You Are Not Allowed');
            } else {
                return view('dashboard');
            }
        } else {
            return redirect()->to('/login')->with('failed', 'Login First');
        }
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
        } else {
            return redirect()->to('/login');
        }
    }
}
