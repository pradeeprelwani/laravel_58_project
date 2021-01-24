<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface
{

    // model property on class instances
    protected $model;
    protected $perPage;

    // Constructor to bind model to repo
    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->perPage = $this->model->perPage ? $this->model->perPage : 10;
    }

    // Get all instances of model
    public function all(array $condition, $columns = null)
    {
        $select=($columns)??"*";
        return $this->model->select($select)->where($condition)->get();
    }

    // create a new record in the database
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // update record in the database
    public function update(array $data, array $condition)
    {
        //\DB::enableQueryLog();
        $record = $this->model->where($condition)->update($data);
        //dd(\DB::getQueryLog());
        return $record;
    }

    // remove record from the database
    public function delete(array $condition)
    {
        return $this->model->where($condition)->delete();
    }

    // show the record with the given condition
    public function show(array $condition, $columns = null)
    {
        $select=(!empty($columns)) ? $columns:"*";
        $query= $this->model->select($select)->where($condition)->first();
        return $query;
    }
}
