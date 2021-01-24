<?php
namespace App\Repositories;

interface RepositoryInterface
{
    public function all(array $condition, $columns = null);

    public function create(array $data);

    public function update(array $data, array $condition);

    public function delete(array $condition);

    public function show(array $condition);
}
