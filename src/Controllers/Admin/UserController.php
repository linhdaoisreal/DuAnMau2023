<?php

namespace Administator\XuongOop\Controllers\Admin;

use Administator\XuongOop\Commons\Controller;
use Administator\XuongOop\Commons\Helper;
use Administator\XuongOop\Commons\Model;
use Administator\XuongOop\Models\User;
use Rakit\Validation\Validator;

class UserController extends Controller{
    private User $user;

    public function __construct () {
        $this -> user = new User();
    }

    public function index(){

        [ $users, $totalPage ] = $this->user->paginate($_GET['page'] ?? 1);

        $this->rendViewAdmin('users.index', [
            'users' => $users,
            'totalPage' => $totalPage,
        ]);
    }

    public function create(){
        $this->rendViewAdmin('users.create', []);
    }

    public function store()
    {
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name'                  => 'required|max:50',
            'email'                 => 'required|email',
            'password'              => 'required|min:6',
            'confirm_password'      => 'required|same:password',
            'avatar'                => 'uploaded_file:0,2M,png,jpg,jpeg',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location:' . url('admin/users/create'));
            exit;
        } else {
            $data = [
                'name'     => $_POST['name'],
                'email'    => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            ];

            if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] > 0) {

                $from = $_FILES['avatar']['tmp_name'];
                $to = 'assets/uploads/' . time() . $_FILES['avatar']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['avatar'] = $to;
                } else {
                    $_SESSION['errors']['avatar'] = 'Upload Không thành công';

                    header('Location:' . url('admin/users/create'));
                    exit;
                }
            }

            $this->user->insert($data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';

            header('Location:' . url('admin/users'));
            exit;
        }
    }

    public function show($id){
       $user = $this->user->findByID($id);

       $this->rendViewAdmin('users.show', [
            'user' => $user,
       ]);
    }

    public function edit($id){
        $user = $this->user->findByID($id);

        // Helper::debug($oneUser);

        $this->rendViewAdmin('users.update', ['user' => $user]);
    }

    public function update($id)
    {
        $user = $this->user->findByID($id);

        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name'                  => 'required|max:50',
            'email'                 => 'required|email',
            'password'              => 'min:6',
            'avatar'                => 'uploaded_file:0,2M,png,jpg,jpeg',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location:' . url("admin/users/{$user['id']}/edit"));
            exit;
        } else {
            $data = [
                'name'     => $_POST['name'],
                'email'    => $_POST['email'],
                'password' => !empty($_POST['password'])
                    ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $user['password'],
            ];

            $flagUpload = false;
            if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] > 0) {

                $flagUpload = true;

                $from = $_FILES['avatar']['tmp_name'];
                $to = 'assets/uploads/' . time() . $_FILES['avatar']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['avatar'] = $to;
                } else {
                    $_SESSION['errors']['avatar'] = 'Upload Không thành công';

                    header('Location:' . url("admin/users/{$user['id']}/edit"));
                    exit;
                }
            }

            $this->user->update($id, $data);

            if (
                $flagUpload
                && $user['avatar']
                && file_exists(PATH_ROOT . $user['avatar'])
            ) {
                unlink(PATH_ROOT . $user['avatar']);
            }

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';

            header('Location:' . url("admin/users/{$user['id']}/edit"));
            exit;
        }
    }

    public function delete($id){

        $user  =$this->user->findByID($id);

        $this->user->delete($id);

        if ($user['avatar'] && file_exists(PATH_ROOT . $user['avatar'])) {
            unlink(PATH_ROOT . $user['avatar']);
        }

        header('Location: ' . url('admin/users'));
        exit();
    }
    
}