<?php
namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface PocketRepositoryInterface
{
    /**
    * @param array $withRelations
    * @return Model
    */
   public function all(array $withRelations = []): Collection;

   /**
    * @param array $attributes
    * @return Model
    */
   public function create(array $attributes): Model;

   /**
    * @param $id
    * @return Model
    */
   public function find($id): ?Model;

   /**
    * @param $id
    * @return bool
    */
    public function delete($id): ?bool;
}