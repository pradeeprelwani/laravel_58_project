<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
class EmployeeRepository extends Repository
{
    protected $model;
    public function __construct(Model $model) {
        $this->model= $model;
    }
    
    public function getEmployeeListrole(){
        return $this->model->with(['role'])->get();
    }
    
}
