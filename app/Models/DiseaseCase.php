<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
        'name',
        'disease_id',		// id
        'case_id',			// automatic generated
        'trmt_plan',
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
     * The relationship method for diseases.
     *
     * as comments.
     */
    public function diseases()
    {
        return $this->hasMany(Disease::class);
    }

    /**
     * The relationship method for user activities.
     *
     * as user activities.
     */
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
