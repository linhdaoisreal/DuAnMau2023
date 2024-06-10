<?php

namespace Administator\XuongOop\Models;

use Administator\XuongOop\Commons\Model;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Query\QueryBuilder;

class Posts extends Model 
{
    protected string $tableName = 'posts';

    public function getConnection(){
        return $this->conn;
    }

    public function paginateRecentPost($page = 1, $perPage = 5){
        $queryBuilder = clone($this->queryBuilder);

        $totalPage = ceil($this->count() / $perPage);

        $offset = $perPage * ($page - 1);

        $data = $queryBuilder
        ->select('p.id', 'p.tittle', 'p.created_at', 'p.content', 'p.status', 
        'p.image', 'p.user_id', 'u.avatar', 'u.name')
        ->from($this->tableName, 'p')
        ->setFirstResult($offset)
        ->setMaxResults($perPage)
        ->innerJoin('p','users', 'u', 'p.user_id = u.id')
        ->orderBy('id', 'desc')
        ->fetchAllAssociative();
        // echo $data->getSQL();die;

        return [$data, $totalPage];
    }

    public function paginatePostByUserID($id, $page = 1, $perPage = 5){
        $queryBuilder = clone($this->queryBuilder);

        $totalPage = ceil($this->count() / $perPage);

        $offset = $perPage * ($page - 1);

        $data = $queryBuilder
        ->select('p.id', 'p.tittle', 'p.created_at', 'p.content', 'p.status', 
        'p.image', 'p.user_id', 'u.avatar', 'u.name')
        ->from($this->tableName, 'p')
        ->setFirstResult($offset)
        ->setMaxResults($perPage)
        ->innerJoin('p','users', 'u', 'p.user_id = u.id')
        ->where('u.id = ?')
        ->setParameter(0, $id)
        ->orderBy('id', 'desc')
        ->fetchAllAssociative();
        // echo $data->getSQL();die;

        return [$data, $totalPage];
    }

    public function findPostDetailsByID($id)
    {
        $queryBuilder = clone($this->queryBuilder);

        $data = $queryBuilder
        ->select('p.id', 'p.tittle', 'p.created_at', 'p.content', 'p.status', 
        'p.image', 'p.user_id', 'u.avatar', 'u.name')
        ->from($this->tableName, 'p')
        ->innerJoin('p','users', 'u', 'p.user_id = u.id')
        ->where('p.id = ?')
        ->setParameter(0, $id)
        ->orderBy('id', 'desc')
        ->fetchAssociative();

        return $data;
    }

    public function paginateSearchPost($search, $page = 1, $perPage = 5){
        $queryBuilder = clone($this->queryBuilder);

        $totalPage = ceil($this->count() / $perPage);

        $offset = $perPage * ($page - 1);

        $data = $queryBuilder
        ->select('p.id', 'p.tittle', 'p.created_at', 'p.content', 'p.status', 
        'p.image', 'p.user_id', 'u.avatar', 'u.name')
        ->from($this->tableName, 'p')
        ->setFirstResult($offset)
        ->setMaxResults($perPage)
        ->innerJoin('p','users', 'u', 'p.user_id = u.id')
        ->where("p.tittle LIKE '%$search%'")
        ->orderBy('p.id', 'desc')
        ->fetchAllAssociative();
        // echo $data->getSQL();die;

        return [$data, $totalPage];
    }
}