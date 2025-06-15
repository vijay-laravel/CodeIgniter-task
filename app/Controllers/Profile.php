<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Profile extends Controller
{
    public function index()
    {
     $session = session();
    $userId = $session->get('userId');

    if (!$userId) {
        return redirect()->to('/auth/login');
    }

    $userModel = new UserModel();
    $user = $userModel->find($userId);

    if (!$user) {
        // user not found, maybe session corrupted
        return redirect()->to('/auth/login');
    }

    return view('profile', ['user' => $user]);
    }

    public function update()
    {
        
        $validation = \Config\Services::validation();
        $rules = [
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email',
        ];
        if (!empty($this->request->getPost('password'))) {
            $rules['password'] = 'min_length[6]';
        }
        if ($this->request->getFile('profile_picture')->isValid() && !$this->request->getFile('profile_picture')->hasMoved()) {
            $rules['profile_picture'] = 'uploaded[profile_picture]|is_image[profile_picture]|max_size[profile_picture,5120]';
        }
        if (!$this->validate($rules)) {
            return redirect()->to('/profile')->withInput()->with('validation', $this->validator);
        }
        $session = session();
        $userModel = new UserModel();
        $user = $userModel->find($session->get('userId'));
        
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];

        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        if ($this->request->getFile('profile_picture')->isValid()) {
            $profilePicture = $this->request->getFile('profile_picture');
            $data['profile_picture'] = $profilePicture->getRandomName();
            $profilePicture->move('uploads', $data['profile_picture']); 

        }
        
        $userModel->update($session->get('userId'), $data);

         return redirect()->to('/dashboard');
    }
}
