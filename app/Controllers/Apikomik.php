<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use App\Models\KomikModel;

class Apikomik extends ResourceController
{
    protected $modelName = '\App\Models\KomikModel';
    protected $format = 'json';

    public function index()
    {
        return $this->respond([
            'status' => 200,
            'errors' => null,
            'data' => $this->model->findAll()
        ], 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {

        $data = $this->model->where('id', $id)->findAll();
        if ($data) {
            // return $this->respond($data, 200);
            return $this->respond([
                'status' => 200,
                'errors' => null,
                'data' => $data
            ], 200);
        } else {
            return $this->failNotFound('Data tidak ditemukan untuk id = ' . $id);
        }
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = [
            'judul' => $this->request->getPost('judul'),
            'slug' => $this->request->getPost('slug'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'rilis' => $this->request->getPost('rilis'),
            'sampul' => $this->request->getPost('sampul'),
            'harga' => $this->request->getPost('harga'),
        ];

        if (!$this->model->save($data)) {
            return $this->fail($this->model->errors());
        }
        return $this->respond([
            'status' => 201,
            'errors' => null,
            'message' => [
                'success' => 'Berhasi Memasukkan Data Komik'
            ]
        ]);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = $this->request->getRawInput();
        $data['id'] = $id;

        $isExist = $this->model->where('id', $id)->findAll();
        if (!$isExist) {
            return $this->failNotFound("Data Tidak Ditemukan untuk id = " . $id);
        }

        if (!$this->model->save($data)) {
            return $this->fail($this->model->errors());
        }
        return $this->respond([
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => "Data Komik dengan id = $id Berhasil Di Update"
            ]
        ]);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $data = $this->model->where('id', $id)->findAll();
        if ($data) {
            $this->model->delete($id);
            return $this->respond([
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => "Data Berhasil Di Hapus "
                ]
            ]);
        } else {
            return $this->failNotFound('Data Tidak Ditemukan');
        }
    }
}
