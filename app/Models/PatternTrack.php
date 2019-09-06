<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Disease;

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
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'pattern_tracks';
    
    /**
     * Belonds to relationship connects both 
     * the diseases table and the this table
     *
     */
    public function diseases()
    {
        return $this->belongsTo(Disease::class);
    }
}
