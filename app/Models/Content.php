<?php

namespace App\Models;

use App\Events\ContentSaved;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Content extends Model
{
    use Notifiable;
    
    protected $fillable = ['url'];

    const UPDATED_AT = NULL;

    protected $dispatchesEvents = [
        'saved' => ContentSaved::class,
    ];

    /**
     * Get the pocket that owns the Content
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pocket(): BelongsTo
    {
        return $this->belongsTo(Pocket::class, 'pocket_id');
    }

    /**
     * Get all of the data for the Content
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function data(): HasMany
    {
        return $this->hasMany(ContentData::class, 'content_id');
    }
}
