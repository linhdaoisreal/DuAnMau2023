<?php
use Administator\XuongOop\Controllers\Admin\CategoriesController;
use Administator\XuongOop\Controllers\Admin\DashboardController;
use Administator\XuongOop\Controllers\Admin\UserController;

// CRUD bao gồm: Danh sách, thêm, sửa, xem, xóa
// User:
//      GET     -> USER/INDEX   ->INDEX-> Danh sách
//      GET     -> USER/CREATE  ->CREATE-> HIỂN THỊ FORM THÊM MỚI
//      POST    -> USER/STORE   ->STORE-> LƯU DỮ LIỆU TỪ FORM THÊM MỚI VÀO DB
//      GET     -> USER/ID      ->SHOW($ID)-> XEM CHI TIẾT
//      GET     -> USER/ID/EDIT ->-> HIỂN THỊ FORM CẬP NHẬT
//      PUT     -> USER/ID      ->-> LƯU DỮ LIỆU TỪ FORM CẬP NHẬT VÀO DB
//      DELETE  -> USER/ID      ->-> XÓA BẢN GHI TRONG DB 

$router->before('GET|POST', '/admin/*.*', function() {
    if (! isset($_SESSION['user'])) {
        header('location: ' . url('login') );
        exit();
    }
});

$router->mount('/admin', function () use ($router) {

    $router->get('/',               DashboardController::class . '@dashboard');

    // CRUD USER
    $router->mount('/users', function () use ($router) {
        $router->get('/',               UserController::class . '@index');
        $router->get('/create',         UserController::class . '@create');
        $router->post('/store',         UserController::class . '@store');
        $router->get('/{id}/show',      UserController::class . '@show');
        $router->get('/{id}/edit',      UserController::class . '@edit');
        $router->post('/{id}/update',   UserController::class . '@update');
        $router->get('/{id}/delete',    UserController::class . '@delete');
    });

    $router->mount('/categories', function () use ($router) {
        $router->get('/',               CategoriesController::class . '@index');
        $router->get('/create',         CategoriesController::class . '@create');
        $router->post('/store',         CategoriesController::class . '@store');
        $router->get('/{id}/edit',      CategoriesController::class . '@edit');
        $router->post('/{id}/update',   CategoriesController::class . '@update');
        $router->get('/{id}/delete',    CategoriesController::class . '@delete');
    });
    
});
