<?php

namespace Administator\XuongOop\Controllers\Admin;

use Administator\XuongOop\Commons\Controller;
use Administator\XuongOop\Commons\Helper;
use Administator\XuongOop\Models\User;

class DashboardController extends Controller
{
    public function dashboard(){
        $this->rendViewAdmin(__FUNCTION__);
    }
}
