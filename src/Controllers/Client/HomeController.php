<?php

namespace Administator\XuongOop\Controllers\Client;

use Administator\XuongOop\Commons\Controller;
use Administator\XuongOop\Commons\Helper;
use Administator\XuongOop\Models\Categories;
use Administator\XuongOop\Models\Posts;


class HomeController extends Controller
{   
    private Categories $category;
    private Posts $post;

    public function __construct(){
        $this -> post = new Posts();
        $this -> category = new Categories();
    }

    public function index()
    {   
        $categories = $this -> category -> allCategories();
        [$recentPost, $totalPage] = $this -> post -> paginateRecentPost();
        // Helper::debug([$recentPost, $totalPage]);
        $this->rendViewClient('home', [
            'categories' => $categories,
            'totalPage'  => $totalPage,
            'recentPost' => $recentPost,
        ]);
    }


}