<?php

namespace Administator\XuongOop\Controllers\Admin;

use Administator\XuongOop\Commons\Controller;
use Administator\XuongOop\Commons\Helper;
use Administator\XuongOop\Models\Categories;
use Administator\XuongOop\Models\Posts;
use Administator\XuongOop\Models\User;

class DashboardController extends Controller
{
    private Categories $categories;
    private Posts $posts;

    public function __construct(){
        $this->categories = new Categories();
        $this->posts = new Posts();
    }
    public function dashboard(){
        $analysPost = $this->categories->analysisPostOfCate();
        // Helper::debug($analysPost);
        $this->rendViewAdmin(__FUNCTION__, [
            'analysPost' => $analysPost
        ]);
    }
}
