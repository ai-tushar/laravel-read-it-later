<?php

namespace App\Repositories;

use App\Models\Pocket;
use App\Repositories\Interfaces\PocketRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PocketRepository implements PocketRepositoryInterface
{
    protected $model;

    public function __construct(Pocket $pocket)
    {
        $this->model = $pocket;
    }

    /**
     * @param array $withRelations
     * @return Collection
    */
    public function all(array $withRelations = []): Collection
    {
        return $this->model->with($withRelations)->get();
    }

    /**
     * @param array $attributes
     * @return Pocket
    */
    public function create(array $attributes): Pocket
    {
        return $this->model->create($attributes);
    }

    /**
     * @param $id
     * @return Pocket
     */
    public function find($id): ?Pocket
    {
        return $this->model->find($id);
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id): ?bool
    {
        return $this->model->findOrFail($id)->delete();
    }
}
