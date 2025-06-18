<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tournament extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','start_date','end_date','organizer_id'];
    protected $dates = ['start_date','end_date'];
    public function organizer()  { return $this->belongsTo(User::class,'organizer_id'); }
    public function teams()      { return $this->belongsToMany(Team::class,'tournament_team')->withPivot('group_name'); }
    public function staff()      { return $this->hasMany(Staff::class); }
}
