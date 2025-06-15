<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function registerProcess()
    {
        
        $validation = \Config\Services::validation();

        if (!$this->validate([
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'profile_picture' => 'uploaded[profile_picture]|is_image[profile_picture]|max_size[profile_picture,5120]',
        ])) {
            return redirect()->to('/auth/register')->withInput()->with('validation', $validation);
        }
        
        $image = $this->request->getFile('profile_picture');

        $imageName = $image->getRandomName();
       
        $image->move('uploads', $imageName); 


        $userModel = new UserModel();
        $userModel->save([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'profile_picture' => $imageName,
        ]);

        return redirect()->to('/auth/login');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginProcess()
    {
        $session = session();
        $userModel = new UserModel();

        $user = $userModel->where('email', $this->request->getPost('email'))->first();
        // print_r($user);
        // die();

        if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
          
            $session->set('isLoggedIn', true);
            $session->set('userId', $user['id']);
            return redirect()->to('/dashboard');
        } else {
        
            $session->setFlashdata('error', 'Invalid login credentials');
            return redirect()->to('/auth/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}

