<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Activity;
use App\Models\Project;
use App\User;

class Tasks extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
    	'project_id',
    	'topic',
    	'team_id',
    	'team_members'
    	'description',
    	'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'tasks';

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
     * the projects table to this table
     *
     */
    public function projects()
    {
        return $this->belongsTo(Project::class);
    }
}
