<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = ['user_id','team_id','tournament_id','role'];
    public function user()       { return $this->belongsTo(User::class); }
    public function team()       { return $this->belongsTo(Team::class); }
    public function tournament() { return $this->belongsTo(Tournament::class); }
}
