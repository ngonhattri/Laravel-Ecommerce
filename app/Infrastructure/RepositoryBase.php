<?php namespace App\Infrastructure;


abstract class RepositoryBase implements IRepositoryBase
{
    protected $model;
    public function __construct()
    {
        $this->setModel();
    }
    abstract public function getModel();
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }
    public function all()
    {
        return $this->model->all();
    }
    public function create(array $data)
    {
        return $this->model->create($data);
    }
    public function update(array $data, $id)
    {
        $record = $this->model->find($id);
        return $record->update($data);
    }
    public function delete($id)
    {
        return $this->model->destroy($id);
    }
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }
    public function with($relations)
    {
        return $this->model->with($relations);
    }
}
