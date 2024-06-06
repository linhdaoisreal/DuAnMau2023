<?php

namespace Administator\XuongOop\Commons;

use eftec\bladeone\BladeOne;

class Controller
{
    protected function rendViewClient($view, $data = []) {
        $templetePath =    __DIR__ . '/../Views/Client';
        $compliedPath =    __DIR__ . '/../Views/Complies';
        $blade = new BladeOne($templetePath, $compliedPath);

        echo $blade->run($view, $data);
    }

    protected function rendViewAdmin($view, $data = []) {
        $templetePath =    __DIR__ . '/../Views/Admin';
        $compliedPath =    __DIR__ . '/../Views/Complies';
        $blade = new BladeOne($templetePath, $compliedPath);

        echo $blade->run($view, $data);
    }
}