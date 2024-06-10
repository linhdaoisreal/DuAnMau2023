<?php

namespace Administator\XuongOop\Models;

use Administator\XuongOop\Commons\Model;

class Post_Category extends Model 
{
    protected string $tableName = 'post_category';

    public function deleteByCategoryID($id)
    {
        return $this->queryBuilder
            ->delete($this->tableName)
            ->where('category_id = ?')
            ->setParameter(0, $id)
            ->executeQuery();
    }

    public function deleteByPostID($id)
    {
        return $this->queryBuilder
            ->delete($this->tableName)
            ->where('post_id = ?')
            ->setParameter(0, $id)
            ->executeQuery();
    }

    public function findByCategoryID($category_id){
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('category_id = ?')
            ->setParameter(0, $category_id)
            ->fetchAssociative();
    }

    public function findByPostID($post_id){
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('post_id = ?')
            ->setParameter(0, $post_id)
            ->fetchAllAssociative();
    }
    
}