<?php

namespace Administator\XuongOop\Controllers\Client;

use Administator\XuongOop\Commons\Controller;
use Administator\XuongOop\Commons\Helper;
use Administator\XuongOop\Models\User;



class LoginController extends Controller{

    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function showFormLogin() {
        auth();
        // Helper::debug($_SESSION['user']);
        $this->rendViewClient('login');
    }

    public function login() {
        auth();

        try {
            $user = $this->user->findByEmail($_POST['email']);

            if (empty($user)) {
                throw new \Exception('Không tồn tại email: ' . $_POST['email']);
            }

            $flag = password_verify($_POST['password'], $user['password']); 
            if ($flag) {

                $_SESSION['user'] = $user;
                if($_SESSION['user']['role'] == 1){
                    header('Location: ' . url('admin/') );
                    exit;
                }else{
                    header('Location: ' . url('/') );
                    exit;
                }
                
            }

            throw new \Exception('Password không đúng');
        } catch (\Throwable $th) {
            $_SESSION['error'] = $th->getMessage();

            header('Location: ' . url('login') );
            exit;
        }
    }

    public function logout() {
        unset($_SESSION['user']);

        header('Location: ' . url() );
        exit;
    }
}