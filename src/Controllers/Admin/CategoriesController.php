<?php

namespace Administator\XuongOop\Controllers\Admin;

use Administator\XuongOop\Commons\Controller;
use Administator\XuongOop\Models\Categories;
use Rakit\Validation\Validator;

class CategoriesController extends Controller{
    private Categories $category;

    public function __construct(){
        $this -> category = new Categories();
    }

    public function index(){

        [ $categories, $totalPage ] = $this->category->paginate($_GET['page'] ?? 1);

        $this->rendViewAdmin('categories.index', [
            'categories' => $categories,
            'totalPage' => $totalPage,
        ]);
    }

    public function create(){
        $this->rendViewAdmin('categories.create', []);
    }

    public function store()
    {
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name'                  => 'required|max:20',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location:' . url('admin/categories/create'));
            exit;
        } else {
            $data = [
                'name'     => $_POST['name'],
            ];

            $this->category->insert($data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';

            header('Location:' . url('admin/categories'));
            exit;
        }
    }

    public function edit($id){
        $category = $this->category->findByID($id);

        // Helper::debug($oneUser);

        $this->rendViewAdmin('categories.update', ['category' => $category]);
    }

    public function update($id)
    {
        $category = $this->category->findByID($id);

        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name'                  => 'required|max:50',
            'status'                 => 'required',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location:' . url("admin/categories/{$category['id']}/edit"));
            exit;
        } else {
            $data = [
                'name'     => $_POST['name'],
                'status'    => $_POST['status'],
            ];

            $this->category->update($id, $data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';

            header('Location:' . url("admin/categories/{$category['id']}/edit"));
            exit;
        }
    }

    public function delete($id){

        $this->category->delete($id);

        header('Location: ' . url('admin/categories'));
        exit();
    }
}
