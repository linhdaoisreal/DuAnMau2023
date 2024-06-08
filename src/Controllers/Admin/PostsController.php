<?php

namespace Administator\XuongOop\Controllers\Admin;

use Administator\XuongOop\Commons\Controller;
use Administator\XuongOop\Commons\Helper;
use Administator\XuongOop\Commons\Model;
use Administator\XuongOop\Models\Post_Category;
use Administator\XuongOop\Models\Posts;
use Administator\XuongOop\Models\User;
use Rakit\Validation\Validator;

class PostsController extends Controller{
    private Posts $posts;

    private Post_Category $post_cate;

    public function __construct () {
        $this -> posts = new Posts();
        $this -> post_cate = new Post_Category();
    }

    public function index(){

        [ $posts, $totalPage ] = $this->posts->paginate($_GET['page'] ?? 1);

        $this->rendViewAdmin('posts.index', [
            'posts' => $posts,
            'totalPage' => $totalPage,
        ]);
    }

    public function show($id){
       $post = $this->posts->findByID($id);

       $this->rendViewAdmin('posts.show', [
            'post' => $post,
       ]);
    }

    public function change_status($id){
        $data = ['status' => $_POST['status']];
        $check = $this->posts->update($id, $data);
        // Helper::debug($check);
        header('Location:' . url("admin/posts"));
        exit;
    }
    

    // public function update($id)
    // {
    //     $user = $this->user->findByID($id);

    //     $validator = new Validator;
    //     $validation = $validator->make($_POST + $_FILES, [
    //         'name'                  => 'required|max:50',
    //         'email'                 => 'required|email',
    //         'password'              => 'min:6',
    //         'avatar'                => 'uploaded_file:0,2M,png,jpg,jpeg',
    //     ]);
    //     $validation->validate();

    //     if ($validation->fails()) {
    //         $_SESSION['errors'] = $validation->errors()->firstOfAll();

    //         header('Location:' . url("admin/users/{$user['id']}/edit"));
    //         exit;
    //     } else {
    //         $data = [
    //             'name'     => $_POST['name'],
    //             'email'    => $_POST['email'],
    //             'status'    => $_POST['status'],
    //             'role'    => $_POST['role'],
    //             'password' => !empty($_POST['password'])
    //                 ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $user['password'],
    //         ];

    //         $flagUpload = false;
    //         if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] > 0) {

    //             $flagUpload = true;

    //             $from = $_FILES['avatar']['tmp_name'];
    //             $to = 'assets/uploads/' . time() . $_FILES['avatar']['name'];

    //             if (move_uploaded_file($from, PATH_ROOT . $to)) {
    //                 $data['avatar'] = $to;
    //             } else {
    //                 $_SESSION['errors']['avatar'] = 'Upload Không thành công';

    //                 header('Location:' . url("admin/users/{$user['id']}/edit"));
    //                 exit;
    //             }
    //         }

    //         $this->user->update($id, $data);

    //         if (
    //             $flagUpload
    //             && $user['avatar']
    //             && file_exists(PATH_ROOT . $user['avatar'])
    //         ) {
    //             unlink(PATH_ROOT . $user['avatar']);
    //         }

    //         $_SESSION['status'] = true;
    //         $_SESSION['msg'] = 'Thao tác thành công';

    //         header('Location:' . url("admin/users/{$user['id']}/edit"));
    //         exit;
    //     }
    // }

    public function delete($id){

        $post  = $this->posts->findByID($id);
        $post_cate  = $this->post_cate->findByPostID($id);

        $this->post_cate->deleteByPostID($id);
        $this->posts->delete($id);

        if ($post['image'] && file_exists(PATH_ROOT . $post['image'])) {
            unlink(PATH_ROOT . $post['image']);
        }

        header('Location: ' . url('admin/posts'));
        exit();
    }
    
}