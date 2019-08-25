<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatternTrack extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'disease_id',			// id of disease
        'case_id',
        'case_freq', 			// integer
        'month',
        'year',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'pattern_tracks';
}
