<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pocket extends Model
{
    protected $fillable = ['title'];

    const UPDATED_AT = NULL;

    /**
     * Get all of the contents for the Pocket
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contents(): HasMany
    {
        return $this->hasMany(Content::class, 'pocket_id');
    }
}
