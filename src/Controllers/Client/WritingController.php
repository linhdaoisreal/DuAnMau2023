<?php

namespace Administator\XuongOop\Controllers\Client;

use Administator\XuongOop\Commons\Controller;
use Administator\XuongOop\Commons\Helper;
use Administator\XuongOop\Models\Categories;
use Administator\XuongOop\Models\Post_Category;
use Administator\XuongOop\Models\Posts;
use Rakit\Validation\Validator;


class WritingController extends Controller
{   
    private Posts $post;
    private Categories $category;
    private Post_Category $post_category;

    public function __construct(){
        $this -> post = new Posts();
        $this -> category = new Categories();
        $this -> post_category = new Post_Category();
    }

    public function index()
    {   
        $categories = $this -> category -> allCategories();
        $this->rendViewClient('writing', ['categories' => $categories]);
    }

    public function store()
    {   
        // $data = [
        //     'tittle'    => $_POST['tittle'],
        //     'content'    => $_POST['content'],
        //     'image'    => $_FILES['image'],
        //     'category_id'    => $_POST['category_id'],
        // ];
        // Helper::debug($_POST['category_id']);

        // die;

        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'tittle'               => 'required|max:50',
            'category_id'          => 'required',
            'content'              => 'required',
            'image'                => 'uploaded_file:0,2M,png,jpg,jpeg',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location:' . url('writing/'));
            exit;
        } else {
            $data = [
                'tittle'    => $_POST['tittle'],
                'content'    => $_POST['content'],
            ];

            if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {

                $from = $_FILES['image']['tmp_name'];
                $to = 'assets/uploads/' . time() . $_FILES['image']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['image'] = $to;
                } else {
                    $_SESSION['errors']['image'] = 'Upload Không thành công';

                    header('Location:' . url('writing/'));
                    exit;
                }
            }

            $this->post->insert($data);

            $conn = $this->post->getConnection();

            $postID = $conn->lastInsertId();

            foreach($_POST['category_id'] as $key => $value){
                $this->post_category->insert([
                    'post_id' => $postID,
                    'category_id' => $value,
                ]);
            }

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Our post is successfully uploaded';

            header('Location:' . url('writing/'));
            exit;
        }

    }

}