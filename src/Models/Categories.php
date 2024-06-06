<?php

namespace Administator\XuongOop\Models;

use Administator\XuongOop\Commons\Model;

class Categories extends Model 
{
    protected string $tableName = 'categories';

    public function allCategories(){
        return $this->all();
    }
}
