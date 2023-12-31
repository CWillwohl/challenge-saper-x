<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PhoneBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'DDD',
        'city',
    ];

    // Relantionships

    public function contacts() : HasMany
    {
        return $this->hasMany(Contact::class);
    }
}
