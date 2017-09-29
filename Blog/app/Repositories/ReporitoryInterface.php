<?php
namespace App\Repositories;

interface ReporitoryInterface
{
    public function all($columns = array('*'));
    
    public function paginate($perPage = 20, $columns = array('*'));
    
    public function create(array $data);
    
    public function update(array $data, $id);
    
    public function delete($id);

    public function find($id);

    //public function changeStatus($id, $attribute = "status_show");
    public function findByField($columns = array('*'));
}