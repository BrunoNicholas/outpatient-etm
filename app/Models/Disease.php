<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DiseaseCase;

class Disease extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
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
     * Belonds to relationship connects both
     * the comment to e parent post, question, sermon 
     * or deveotional
     *
     */

    public function diseaseCases()
    {
        return $this->belongsTo(Question::class);
    }
}
