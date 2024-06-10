<?php

namespace Administator\XuongOop\Models;

use Administator\XuongOop\Commons\Model;

class Categories extends Model 
{
    protected string $tableName = 'categories';

    public function allCategories(){
        return $this->all();
    }

    public function getPostCategories(){
        $data = $this->queryBuilder
        ->select('c.name', 'pc.post_id', 'c.id')
        ->distinct()
        ->from($this->tableName, 'c')
        ->innerJoin('c','post_category', 'pc', 'pc.category_id = c.id')
        ->orderBy('post_id', 'asc')
        ->fetchAllAssociative();

        // echo $data->getSQL();die;

        return $data;
    }

    public function getCategoriesOfOnePost($id){
        $data = $this->queryBuilder
        ->select('c.name', 'pc.post_id', 'pc.category_id')
        ->distinct()
        ->from($this->tableName, 'c')
        ->innerJoin('c','post_category', 'pc', 'pc.category_id = c.id')
        ->where('pc.post_id = ?')
        ->setParameter(0, $id)
        ->orderBy('post_id', 'asc')
        ->fetchAllAssociative();

        // echo $data->getSQL();die;

        return $data;
    }

    public function allPostByCate($id){
        $data = $this -> queryBuilder
        ->select('p.id', 'p.tittle', 'p.created_at', 'p.content', 'p.status', 
        'p.image', 'p.user_id', 'u.avatar', 'u.name', 'pc.category_id')
        ->from($this->tableName, 'c')
        ->innerJoin('c','post_category', 'pc', 'pc.category_id = c.id')
        ->innerJoin('pc', 'posts', 'p', 'p.id = pc.post_id')
        ->innerJoin('p','users', 'u', 'p.user_id = u.id')
        ->where('pc.category_id = ?')
        ->setParameter(0, $id)
        ->orderBy('id', 'desc')
        ->fetchAllAssociative();
        // echo $data->getSQL();die;

        return $data;
    }

    public function analysisPostOfCate(){
        $data = $this -> queryBuilder
        ->select('c.id','c.name', 'COUNT(p_c.post_id) as analys_post')
        ->from($this->tableName, 'c')
        ->leftJoin('c','post_category', 'p_c', 'p_c.category_id = c.id')
        ->groupBy('c.id', 'c.name')
        ->orderBy('analys_post', 'desc')
        ->fetchAllAssociative();

        // echo $data->getSQL();die;   

        return $data;
    }
}
