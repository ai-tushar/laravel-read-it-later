<?php
namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ContentRepositoryInterface
{
   /**
    * @param int $pocketId
    * @param array $attributes
    * @return Model
    */
   public function create(int $pocketId, array $attributes): Model;

   /**
    * @param int $id
    * @return Model
    */
   public function find(int $id): ?Model;

   /**
    * @param int $pocketId
    * @return Collection
    */
    public function allByPocketId(int $pocketId): Collection;

   /**
    * @param $id
    * @return bool
    */
    public function delete($id): ?bool;

    /**
    * @param int $contentId
    * @param array $attributesArray
    * @return Model
    */
    public function createDataMany(int $contentId, array $attributesArray): bool;
}