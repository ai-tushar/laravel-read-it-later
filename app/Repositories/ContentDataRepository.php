<?php

namespace App\Repositories;

use App\Models\ContentData;
use App\Repositories\Interfaces\ContentDataRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ContentDataRepository implements ContentDataRepositoryInterface
{
    protected $model;

    public function __construct(ContentData $contentData)
    {
        $this->model = $contentData;
    }

    /**
     * @param int $contentId
     * @param array $attributes
     * @return Content
    */
    public function create(int $contentId, array $attributes): ContentData
    {
        $this->model->content()->associate($contentId);
        $this->model->fill($attributes)->save();
        return $this->model;
    }

    /**
     * @param int $id
     * @return ContentData
     */
    public function find(int $id): ?ContentData
    {
        return $this->model->find($id);
    }

    /**
    * @param int $contentId
    * @return Collection
    */
    public function allByContentId(int $contentId): Collection
    {
        return $this->model->whereContentId($contentId)->get();
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
