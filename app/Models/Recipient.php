<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipient extends Pivot
{
    use HasFactory, SoftDeletes;

    public $timestamps = false;

    protected $casts = [
        'read_at' => 'datetime'
    ];

    /**
     * @return BelongsTo
     */
    public function message(): BelongsTo
    {
        return $this->belongsTo(Message::class, 'user_id');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
