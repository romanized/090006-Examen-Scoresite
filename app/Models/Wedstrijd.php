<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wedstrijd extends Model
{
    use HasFactory;

    protected $table = 'wedstrijden';

    protected $fillable = [
        'thuis_team_id',
        'uit_team_id',
        'datum',
        'locatie',
        'status',
        'thuis_score',
        'uit_score',
    ];

    public function thuisTeam()
    {
        return $this->belongsTo(\App\Models\Team::class, 'thuis_team_id');
    }

    public function uitTeam()
    {
        return $this->belongsTo(\App\Models\Team::class, 'uit_team_id');
    }
}
