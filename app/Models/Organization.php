<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = ['name','description','website_url'];
    public function teams() { return $this->hasMany(Team::class); }
}
