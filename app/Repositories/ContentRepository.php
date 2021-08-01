<?php

namespace App\Repositories;

use App\Models\Content;
use App\Repositories\Interfaces\ContentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ContentRepository implements ContentRepositoryInterface
{
    protected $model;

    public function __construct(Content $content)
    {
        $this->model = $content;
    }

    /**
     * @param int $pocketId
     * @param array $attributes
     * @return Content
    */
    public function create(int $pocketId, array $attributes): Content
    {
        $this->model->pocket()->associate($pocketId);
        $this->model->fill($attributes)->save();
        return $this->model;
    }

    /**
     * @param int $id
     * @return Content
     */
    public function find(int $id): ?Content
    {
        return $this->model->find($id);
    }

    /**
    * @param int $pocketId
    * @return Collection
    */
    public function allByPocketId(int $pocketId): Collection
    {
        return $this->model->wherePocketId($pocketId)->get();
    }
    

    /**
     * @param $id
     * @return bool
     */
    public function delete($id): ?bool
    {
        return $this->model->findOrFail($id)->delete();
    }

    /**
    * @param int $contentId
    * @param array $attributesArray
    * @return Model
    */
    public function createDataMany(int $contentId, array $attributesArray): bool
    {
        try {
            $this->model->findOrFail($contentId)->data()->createMany($attributesArray);
            return true;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
