<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

use App\Models\Message;
use App\Models\Leave;
use App\Models\Activity;
use App\Models\Team;

// class User extends Authenticatable implements MustVerifyEmailContract
class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'age',
        'gender',
        'profile_image',
        'location',
        'telephone',
        'role',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The relationship method for messages.
     *
     * as messages.
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * The relationship method for user leaves.
     *
     * as user leaves.
     */
    public function leaves()
    {
        return $this->hasMany(Leave::class);
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

    /**
     * The relationship method for user activities.
     *
     * as teams activities.
     */
    public function teams()
    {
        return $this->hasMany(Team::class);
    }
}
