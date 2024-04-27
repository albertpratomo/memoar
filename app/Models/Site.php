<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Site extends Model
{
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'died_at' => 'datetime',
        ];
    }

    /**
     * Get the Tribute(s) for the Site.
     */
    public function tributes(): HasMany
    {
        return $this->hasMany(Tribute::class);
    }
}
