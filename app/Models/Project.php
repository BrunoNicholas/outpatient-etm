<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DiseaseCase;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_name',
        'disease_case_id',  	// from disease_cases table
        'start_date',
        'end_date',
        'user_id',
        'description',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'projects';

    /**
     * Belonds to relationship connects both
     * the users table to this table
     *
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Belonds to relationship connects both
     * the disease_cases table to this table
     *
     */
    public function disease_cases()
    {
        return $this->belongsTo(DiseaseCase::class);
    }
}
