<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'avatar_url',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return BelongsToMany
     */
    public function conversations(): BelongsToMany
    {
        // Realted model
        // Pivot table
        // F.K. for current model in pivot table
        // F.K. for related model in pivot table
        // current model key (p.k.)
        // related model key (p.k. realted model
        return $this->belongsToMany(
            Conversation::class,
            'participants',
            'user_id',
            'conversation_id',
            'id',
            'id',
        )
            ->latest('last_message_id')
            ->withPivot([
                'role', 'joined_at'
            ]);
    }

    /**
     * @return HasMany
     */
    public function sentMessages(): HasMany
    {
        return $this->hasMany(Message::class, 'user_id');
    }

    /**
     * @return BelongsToMany
     */
    public function received_Messages(): BelongsToMany
    {
        return $this->belongsToMany(Conversation::class, 'recipients', 'user_id')
            ->withPivot([
                'role', 'deleted_at'
            ]);
    }
}
