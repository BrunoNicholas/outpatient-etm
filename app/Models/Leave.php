<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Leave extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'applicant',
    	'user_id', // recipient
    	'department',
    	'reason',
    	'description',
    	'date_from',
    	'date_to',
    	'priority',
    	'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'leaves';
    
    /**
     * Belonds to relationship connects both 
     * the user table and the this table
     *
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
