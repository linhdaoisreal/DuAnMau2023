<?php
use Administator\XuongOop\Controllers\Client\CategoriesController;
use Administator\XuongOop\Controllers\Client\AboutController;
use Administator\XuongOop\Controllers\Client\ContactController;
use Administator\XuongOop\Controllers\Client\HomeController;
use Administator\XuongOop\Controllers\Client\LoginController;
use Administator\XuongOop\Controllers\Client\PostController;
use Administator\XuongOop\Controllers\Client\WritingController;

//Website có các trang
//  Trang chủ
//  Giới thiệu
//  Sản phẩm
//  Chi tiết sản phẩm
//  Liên hệ

//Để định nghĩa được cần tạo controller trước
//Khai báo function tương ứng để xử lý
//Định nghĩa đường dẫn


$router->get('/',                 HomeController::class . '@index');
$router->get('/about',            AboutController::class . '@index');

$router->get('/writing',          WritingController::class . '@index');
$router->post('/writing/store',   WritingController::class . '@store');

$router->get('/contact',          ContactController::class . '@index');
$router->post('/contact/store',   ContactController::class . '@store');

$router->get('post-by-category/{id}',       CategoriesController::class . '@postByCategory');

$router->get('/post/{id}',         PostController::class . '@detail');
$router->get('/post/user-post',    PostController::class . '@detail');
$router->post('/post/search',      PostController::class . '@searchPost');

$router->get('/login',            LoginController::class . '@showFormLogin');
$router->post('/handle-login',    LoginController::class . '@login');
$router->get('/logout',           LoginController::class . '@logout');