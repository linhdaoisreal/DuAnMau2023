<?php 

const PATH_ROOT = __DIR__ . '/';

if (!function_exists('asset')) {
    function asset($path) {
        return $_ENV['BASE_URL'] . $path;
    }
}

if (!function_exists('url')) {
    function url($uri = null) {
        return $_ENV['BASE_URL'] . $uri;
    }
}

if (!function_exists('auth')) {
    function auth() {
        if (isset($_SESSION['user']) ) {
            if ($_SESSION['user']['role'] == 1) {
                header('Location: ' . url('admin/') );
                exit;
            }
            header('Location: ' . url('') );
            exit;
        }
        
    }
}