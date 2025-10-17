<?php

namespace App\Controllers\Admin;

use App\Models\Admin\ApplicantsModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

/**
 * @property \CodeIgniter\HTTP\IncomingRequest $request
 */

class ApplicantsController extends ResourceController
{
    protected $applicantsModel;

    public function __construct()
    {
        $this->applicantsModel = new ApplicantsModel();
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
        $data['applicants'] = $this->applicantsModel->findAll();
        return view('admin/app-show', $data);
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
        return view('admin/app-create', ['validation' => \config\Services::validation()]);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        //
        $data = $this->request->getPost();
        $rules = [
            'name'              => ['rules' => 'required|', 'errors' => ['required' => 'Nama pelamar tidak boleh kosong']],
            'graduated_from'    => ['rules' => 'required|', 'errors' => ['required' => 'Lulusan tidak boleh kosong']],
            'gpa_score'         => ['rules' => 'required|decimal|less_than_equal_to[4.01]', 'errors' => ['required' => 'GPA tidak boleh kosong', 'decimal' => 'Masukan GPA yang valid', 'less_than_equal_to' => 'Angka tidak boleh lebih dari 4.00']],
            'portfolio_notes'   => ['rules' => 'required|', 'errors' => ['required' => 'Portofolio Note tidak boleh kosong']],
        ];
        if (!$this->validate($rules)) {
            return view('admin/app-create', ['validation' => $this->validator]);
        }

        $this->applicantsModel->save($data);
        return redirect()->to(site_url('applicants'))->with('success', 'Berhasil menambah Data Pelamar');
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
        $validation = \Config\Services::validation();
        if (session()->has('errors')) {
            foreach (session('errors') as $field => $error) {
                $validation->setError($field, $error);
            }
        }
        return view('admin/app-edit', [
            'applicant'         => $this->applicantsModel->find($id),
            'validation'        => $validation,
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
        //
        $rules = [
            'name'              => ['rules' => 'required|', 'errors' => ['required' => 'Nama pelamar tidak boleh kosong']],
            'graduated_from'    => ['rules' => 'required|', 'errors' => ['required' => 'Lulusan tidak boleh kosong']],
            'gpa_score'         => ['rules' => 'required|decimal|less_than_equal_to[4.01]', 'errors' => ['required' => 'GPA tidak boleh kosong', 'decimal' => 'Masukan GPA yang valid', 'less_than_equal_to' => 'Angka tidak boleh lebih dari 4.00']],
            'portfolio_notes'   => ['rules' => 'required|', 'errors' => ['required' => 'Portofolio Note tidak boleh kosong']],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost();
        $this->applicantsModel->update($id, $data);
        return redirect()->to(site_url('applicants'))->with('success', 'Berhasil Edit Data Pelamar');
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
        $this->applicantsModel->delete($id);
        return redirect()->to(site_url('applicants'))->with('message', 'Berhasil Hapus Data Pelamar');
    }
}
