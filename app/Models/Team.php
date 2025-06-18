<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Auditable;

class Team extends Model
{
    // use Auditable;
    use HasFactory;
    protected $fillable = ['name','organization_id','created_by'];
    public function organization() { return $this->belongsTo(Organization::class); }
    public function creator()      { return $this->belongsTo(User::class,'created_by'); }
    public function players()      { return $this->hasMany(Player::class); }
    public function staff()        { return $this->hasMany(Staff::class); }
    public function tournaments()  { return $this->belongsToMany(Tournament::class,'tournament_team')->withPivot('group_name'); }
}
