<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'applicant',
    	'recipient',
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
}
