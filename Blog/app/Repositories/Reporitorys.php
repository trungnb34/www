<?php
namespace App\Repositories;

use App\Repositories\ReporitoryInterface;

class Reporitorys implements ReporitoryInterface
{
    public function all($columns = array('*'))
    {
        return $this->model->get($columns);
    }

    public function paginate($perPage = 20, $columns = array('*'))
    {
        return $this->model->paginate($perPage, $columns);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id, $attribute = "id")
    {
        if($this->model->find($id))
        {
            return $this->model->where($attribute, '=', $id)->update($data);
        }
    }

    public function delete($id)
    {
        if($this->model->find($id))
        {
            return $this->model->destroy($id);
        }
    }

    public function find($id)
    {
        if($find = $this->model->find($id))
        {
            return $this->model->find($id);
        }
    }
    public function findByField($columns = array('*'), $allow = '=')
    {
        $sql = 'select * from '.$this->model.'where';
        foreach ($columns as $key => $column)
        {
            $sql .= ' '.$key.' '. $allow.' '.$column;
        }
        echo $sql; die();
    }
}