<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'last_message_id',
        'label',
        'type',
    ];

    protected $casts = [

    ];

    /**
     * @return BelongsToMany
     */
    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'participants')
            ->withPivot([
                'role', 'joined_at',
            ]);
    }

    /**
     * @return HasMany
     */
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class, 'conversation_id')
//            ->latest()
            ;
    }

    /**
     * @return HasManyThrough
     */
    public function recipients(): HasManyThrough
    {
        return $this->hasManyThrough(
            Recipient::class,
            Message::class,
            'conversation_id',
            'message_id',
            'id',
            'id'
        );
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function last_message(): BelongsTo
    {
        return $this->belongsTo(Message::class, 'last_message_id', 'id')
            ->withDefault();
    }

}
