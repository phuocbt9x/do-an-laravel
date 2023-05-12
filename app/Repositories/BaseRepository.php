<?php
namespace App\Repositories;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    public Model $model;

    /**
     * @throws BindingResolutionException
     */
    public function __construct()
    {
        $this->makeModel();
    }

    abstract public function model();

    /**
     * @throws BindingResolutionException
     */
    public function makeModel(): void
    {
        $this->model = app()->make($this->model());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->model->all();
    }

    public function paginate($limit = null, $column = ['*'])
    {
        $limit = is_null($limit) ? config('app.paginate.limit') : $limit;
        return $this->model->paginate($limit, $column);
    }

    public function find($id, $column = ['*'])
    {
        return $this->model->findOrFail($id, $column);
    }

    public function findWithoutRedirect($id, $column)
    {
        return $this->model->find($id, $column);
    }

    public function findOrFailWithTrashed($id, $columns = ['*'])
    {
        return $this->model->withTrashed()->findOrFail($id);
    }

    public function create(array $input)
    {
        return $this->model->create($input);
    }

    public function update(array $input, $id)
    {
        $model = $this->model->findOrFail($id);
        $model->update($input);

        return $model;
    }

    public function delete($id): bool
    {
        return $this->model->findOrFail($id)->delete();
    }

    public function multipleDelete(array $ids): bool
    {
        return $this->model->destroy(array_values($ids));
    }

    public function latest($column = 'id')
    {
        return $this->model->latest($column);
    }

    public function updateOrCreate(array $arrayFind, $arrayCreate = ['*'])
    {
        return $this->model->updateOrCreate($arrayFind, $arrayCreate);
    }

    public function insertMany($data)
    {
        return count($data) > 0 ? $this->model->insert($data) : null;
    }
}
