<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_book_id',
        'birthday',
        'email',
        'phone',
        'name',
        'cpf',
    ];


    // Relantionships

    public function phoneBook() : BelongsTo
    {
        return $this->belongsTo(PhoneBook::class);
    }
}
