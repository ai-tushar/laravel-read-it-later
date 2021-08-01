<?php
namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ContentDataRepositoryInterface
{
   /**
    * @param int $contentId
    * @param array $attributes
    * @return Model
    */
   public function create(int $contentId, array $attributes): Model;

   /**
    * @param int $id
    * @return Model
    */
   public function find(int $id): ?Model;

   /**
    * @param int $contentId
    * @return Collection
    */
    public function allByContentId(int $contentId): Collection;

   /**
    * @param $id
    * @return bool
    */
    public function delete($id): ?bool;
}