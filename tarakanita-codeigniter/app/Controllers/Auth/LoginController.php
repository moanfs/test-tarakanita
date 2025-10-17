<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\Admin\AdminModel;
use CodeIgniter\HTTP\ResponseInterface;

class LoginController extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        helper(['form']);
    }

    public function index()
    {
        //
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }
        $data['validation'] = \config\Services::validation();
        return view('auth/login', $data);
    }

    public function attempLogin()
    {
        // $data = $this->request->getPost();
        $rules = [
            'email'         => [
                'rules' =>  'required|valid_email',
                'errors' => ['required' => 'email tidak boleh kosong', 'valid_email'  => 'Email tidak valid']
            ],
            'password'      => [
                'rules' =>  'required|',
                'errors' => ['required' => 'password tidak boleh kosong']
            ]
        ];
        if (!$this->validate($rules)) {
            // return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            $data['validation'] = $this->validator;
            return view('auth/login', $data);
        }
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $admin = $this->adminModel->findAdminWithRole($email);

        if ($admin && password_verify($password, $admin['password'])) {
            $sessionData = [
                'user_id'   => $admin['id'],
                'username'  => $admin['username'],
                'email'     => $admin['email'],
                'role_id'   => $admin['role_id'],
                'role_name' => $admin['role_name'],
                'isLoggedIn' => true,
            ];
            session()->set($sessionData);
            return redirect()->to('/')->with('success', 'Login berhasil! Selamat datang, ' . $admin['username']);
        } else {
            return redirect()->back()->withInput()->with('message', 'Email atau Password anda salah.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('login'));
    }
}
