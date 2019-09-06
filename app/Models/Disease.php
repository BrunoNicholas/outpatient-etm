<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PatternTrack;
use App\Models\DiseaseCase;

class Disease extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'disease_name',
        'frequency',
        'description',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'diseases';

    /**
     * The relationship method for pattern tracks.
     *
     * as pattern tracks.
     */
    public function pattern_tracks()
    {
        return $this->hasMany(PatternTrack::class);
    }

    /**
     * Belonds to relationship connects both
     * the disease cases table to this table
     *
     */

    public function diseaseCases()
    {
        return $this->belongsTo(DiseaseCase::class);
    }
}
