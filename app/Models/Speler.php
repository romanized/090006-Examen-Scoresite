<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speler extends Model
{
    use HasFactory;

    protected $fillable = [
        'naam',
        'positie',
        'rugnummer',
        'team_id',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
