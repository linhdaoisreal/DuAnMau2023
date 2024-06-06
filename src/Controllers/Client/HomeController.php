<?php

namespace Administator\XuongOop\Controllers\Client;

use Administator\XuongOop\Commons\Controller;
use Administator\XuongOop\Models\Categories;


class HomeController extends Controller
{   
    private Categories $category;

    public function __construct(){
        
        $this -> category = new Categories();
    }

    public function index()
    {   
        $categories = $this -> category -> allCategories();
        $this->rendViewClient('home', ['categories' => $categories]);
    }


}