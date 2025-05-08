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

    public function spelers() {
        return $this->hasMany(Speler::class);
    }
    
    public function thuiswedstrijden() {
        return $this->hasMany(Wedstrijd::class, 'thuis_team_id');
    }
    
    public function uitwedstrijden() {
        return $this->hasMany(Wedstrijd::class, 'uit_team_id');
    }
    
}
