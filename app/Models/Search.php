<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Search extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
