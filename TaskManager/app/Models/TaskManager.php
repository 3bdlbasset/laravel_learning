<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskManager extends Model
{
    protected $fillable = [
        'title',
        'description',
        'priority',
        'completed',
        'user_id',
    ];

    protected $casts=[
        'completed' => 'boolean',
        'completed_at' => 'datetime'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
