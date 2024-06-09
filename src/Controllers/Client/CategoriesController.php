<?php

namespace Administator\XuongOop\Controllers\Client;

use Administator\XuongOop\Commons\Controller;
use Administator\XuongOop\Commons\Helper;
use Administator\XuongOop\Models\Categories;
use Administator\XuongOop\Models\Posts;

class CategoriesController extends Controller{

    private Posts $posts;
    private Categories $categories;

    public function __construct(){
        $this -> posts = new Posts();
        $this -> categories = new Categories();
    }
    public function postByCategory($id){
        $categories = $this -> categories -> allCategories();
        $recentPost = (new Categories) -> allPostByCate($id);
        $post_categories = (new Categories) -> getPostCategories(); 

        // Helper::debug($recentPost);
        // Helper::debug($post_categories);

        $this->rendViewClient('post-by-cate', [
            'categories'      => $categories,
            'recentPost'      => $recentPost,
            'post_categories' => $post_categories,
        ]);
    }
    
}