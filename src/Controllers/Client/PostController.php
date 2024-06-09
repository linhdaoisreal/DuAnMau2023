<?php

namespace Administator\XuongOop\Controllers\Client;

use Administator\XuongOop\Commons\Controller;
use Administator\XuongOop\Commons\Helper;
use Administator\XuongOop\Models\Categories;
use Administator\XuongOop\Models\Posts;

class PostController extends Controller{

    private Posts $posts;
    private Categories $categories;

    public function __construct(){
        $this -> posts = new Posts();
        $this -> categories = new Categories();
    }
    public function index(){
        echo __CLASS__ .'@'. __FUNCTION__;
    }

    public function detail($id){
        $post = $this->posts->findPostDetailsByID($id);
        $one_post_cates = $this->categories->getCategoriesOfOnePost($id);

        // Helper::debug($post);
        // Helper::debug($one_post_cates);

        $this->rendViewClient('post-detail', [
            'post' => $post,
            'one_post_cates' => $one_post_cates,
        ]);
    }

    public function searchPost(){
        $s = '%' . $_POST['search'] . '%';

        $categories = $this -> categories -> allCategories();
        [$search_results, $totalPage] = $this->posts->paginateSearchPost($s, $_GET['page'] ?? 1);
        $post_categories = $this -> categories -> getPostCategories(); 

        $this->rendViewClient('post-by-search', [
            'categories'      => $categories,
            'totalPage'       => $totalPage,
            'search_results'  => $search_results,
            'post_categories' => $post_categories,
        ]);
    }
    
    
}