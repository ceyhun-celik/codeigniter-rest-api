<?php

namespace App\Controllers;

use App\Models\Users_model;

class Users extends BaseController
{
    public function __construct()
    {
        $this->model = new Users_model();
    }
    public function index()
    {
        try {
            $model = $this->model->get();
            echo json_encode($model);
        } catch (\Throwable $th) {
            print_r($th);
        }
    }

    public function show($id)
    {
        try {
            $model = $this->model->get($id);
            echo json_encode($model);
        } catch (\Throwable $th) {
            echo "Error: {$th}";
        }
    }

    public function create()
    {
        $request = $this->request;

        $data = array(
            'name' => $request->getPost('name'),
            'surname' => $request->getPost('surname'),
            'birthday' => $request->getPost('birthday')
        );

        try {
            $model = $this->model->create($data);
            echo $model;
        } catch (\Throwable $th) {
            echo "Error: {$th}";
        }
    }

    public function update($id)
    {
        $request = $this->request->getRawInput();

        $data = array(
            'name' => $request['name'],
            'surname' => $request['surname'],
            'birthday' => $request['birthday']
        );

        try {
            $model = $this->model->modify($data, $id);
            echo $model;
        } catch (\Throwable $th) {
            echo "Error: {$th}";
        }
    }

    public function delete($id)
    {
        try {
            $model = $this->model->destroy($id);
            echo $model;
        } catch (\Throwable $th) {
            echo "Error: {$th}";
        }
    }
}