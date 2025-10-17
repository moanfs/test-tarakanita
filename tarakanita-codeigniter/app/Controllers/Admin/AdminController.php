<?php

namespace App\Controllers\Admin;

use App\Models\Admin\AdminModel;
use App\Models\Admin\RolesModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

/**
 * @property \CodeIgniter\HTTP\IncomingRequest $request
 */

class AdminController extends ResourceController
{
    protected $adminModel;
    protected $rolesModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->rolesModel = new RolesModel();
        helper(['form']);
    }
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        //   
        $currentUserId = session()->get('user_id');
        return view('admin/admin-show', ['admins' => $this->adminModel->findAllAdmins($currentUserId)]);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
        return view('admin/admin-create', ['validation' => \config\Services::validation()]);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        //
        $rules = [
            'username'          => ['rules' => 'required|', 'errors' => ['required' => 'Username tidak boleh kosong']],
            'email'             => ['rules' => 'required|valid_email|is_unique[admins.email]|', 'errors' => ['required' => 'Lulusan tidak boleh kosong', 'valid_email'  => 'Email tidak valid', 'is_unique'  => 'Email sudah terdaftar']],
            'password'          => ['rules' => 'required|', 'errors' => ['required' => 'Password tidak boleh kosong']],
            'password_confirm'  => ['rules' => 'required|matches[password]', 'errors' => ['required' => 'Password tidak boleh kosong', 'matches' => 'Password tidak sama']],
        ];
        if (!$this->validate($rules)) {
            return view('admin/admin-create', ['validation' => $this->validator]);
            // return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $data = $this->request->getPost();
        $this->adminModel->save([
            'role_id'   => 2,
            'username'  => $data['username'],
            'email'     => $data['email'],
            'password'  => password_hash($data['password'], PASSWORD_DEFAULT)
        ]);
        return redirect()->to(site_url('admin'))->with('message', 'Berhasil menambah admin');
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
        return view('admin/admin-edit', [
            'admin'         => $this->adminModel->find($id),
            'roles'         => $this->rolesModel->findAllRoles(),
            'validation'    => \config\Services::validation(),
        ]);
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        $rules = [
            'role_name'  => ['rules' => 'required|', 'errors' => ['required' => 'Role harus dipilih boleh kosong']],
        ];
        if (!$this->validate($rules)) {
            return view('admin/admin-edit', [
                'admin'         => $this->adminModel->find($id),
                'roles'         => $this->rolesModel->findAllRoles(),
                'validation'    => $this->validator,
            ]);
        }
        $data = $this->request->getPost();
        // $this->adminModel->update($id, $data);
        $this->adminModel->update($id, ['role_id' => $data['role_name']]);
        return redirect()->to(site_url('admin'))->with('success', 'Berhasil Edit Peran');
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
        $this->adminModel->delete($id);
        return redirect()->to(site_url('admin'))->with('message', 'Berhasil Hapus Data Admin');
    }
}
