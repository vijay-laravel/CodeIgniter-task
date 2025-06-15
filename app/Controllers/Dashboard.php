<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        $session = session();
        $userModel = new UserModel();
        $user = $userModel->find($session->get('userId'));

        return view('dashboard', ['user' => $user]);
    }
}
