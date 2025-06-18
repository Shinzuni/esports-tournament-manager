<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function teamsCreated()
    {
        return $this->hasMany(Team::class,'created_by');
    }

    public function organizedTournaments()
    {
        return $this->hasMany(Tournament::class,'organizer_id');
    }

    public function playerProfile()
    {
        return $this->hasOne(Player::class);
    }

    public function staffAssignments()
    {
        return $this->hasMany(Staff::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }
    
    public function isOrganizer()
    {
        return $this->role === 'organizer';
    }

    public function isGuest()
    {
        return $this->role === 'guest';
    }

}
