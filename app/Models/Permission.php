<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model
{
    protected $fillable = [
        'key',
    ];

    // protected $casts = [
    //     'key' => Can::class
    // ]; => play 72.26 - 11:25

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
