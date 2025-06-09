<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'category',
        'poster',
        'habilitated',
        'content',
    ];

    protected $casts = [
        'habilitated' => 'boolean',
    ];

    /**
     * Get the user that owns the post.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
