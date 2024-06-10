<?php

namespace Administator\XuongOop\Controllers\Client;

use Administator\XuongOop\Commons\Controller;
use Administator\XuongOop\Commons\Helper;
use Administator\XuongOop\Models\Categories;
use Administator\XuongOop\Models\Post_Category;
use Administator\XuongOop\Models\Posts;


class HomeController extends Controller
{   
    private Categories $category;
    private Posts $post;
    private Post_Category $post_category;

    public function __construct(){
        $this -> post = new Posts();
        $this -> category = new Categories();
    }

    public function index()
    {   
        $categories = $this -> category -> allCategories();
        [$recentPost, $totalPage] = $this -> post -> paginateRecentPost($_GET['page'] ?? 1);
        $post_categories = $this -> category -> getPostCategories();
        $analysCate = (new Categories) -> analysisPostOfCate();

        // Helper::debug([$recentPost, $totalPage]);
        // Helper::debug($post_categories);

        $this->rendViewClient('home', [
            'categories'      => $categories,
            'totalPage'       => $totalPage,
            'recentPost'      => $recentPost,
            'post_categories' => $post_categories,
            'analysCate'      => $analysCate,
        ]);
    }


}