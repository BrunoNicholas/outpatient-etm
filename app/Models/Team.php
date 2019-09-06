<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Team extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'team_name',
    	'user_id',
    	'team_members',
    	'description'
    	'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'teams';

    /**
     * Belonds to relationship connects both
     * the users table to this table
     *
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
