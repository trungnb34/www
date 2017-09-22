<?php
namespace App\Repositories;

use App\Repositories\ReporitoryInterface;

class Reporitorys implements ReporitoryInterface
{
    public function all($columns = array('*'))
    {
        return $this->model->get($columns);
    }

    public function paginate($perPage = 15, $columns = array('*'))
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
}