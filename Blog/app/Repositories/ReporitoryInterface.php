<?php
namespace App\Repositories;

interface ReporitoryInterface
{
    public function all($columns = array('*'));
    
    public function paginate($perPage = 15, $columns = array('*'));
    
    public function create(array $data);
    
    public function update(array $data, $id);
    
    public function delete($id);
}