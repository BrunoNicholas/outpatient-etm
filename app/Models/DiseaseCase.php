<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Disease;
use App\Models\Activity;

class DiseaseCase extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'case_name',
        'disease_id',		// id
        'case_id',			// automatic generated
        'treatment_plan',
        'description',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'disease_cases';

    /**
     * The relationship method for user activities.
     *
     * as user activities.
     */
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    /**
     * The relationship method for user projects.
     *
     * as user projects.
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Belonds to relationship connects both
     * the diseases table to this table
     *
     */
    public function diseases()
    {
        return $this->belongsTo(Disease::class);
    }
}
