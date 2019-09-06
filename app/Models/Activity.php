<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DiseaseCase;
use App\Models\Tasks;
use App\User;

class Activity extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
    	'user_id', // supervisor
    	'task_id',
    	'disease_case_id',
    	'client',
    	'description',
        'location',
    	'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'activities';

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
     * the tasks table to this table
     *
     */
    public function tasks()
    {
        return $this->belongsTo(Tasks::class);
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
