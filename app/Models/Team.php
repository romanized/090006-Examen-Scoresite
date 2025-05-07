<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'naam',
        'stad',
        'logo_url',
    ];

    public function spelers()
    {
        return $this->hasMany(\App\Models\Speler::class);
    }
}
