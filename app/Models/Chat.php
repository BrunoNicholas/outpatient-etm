<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    /**
     * The attribute here referes to the table.
     *
     * @var array
     */
    protected $table = 'chats';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'sender_id',
        'sen_email',
        'sen_name',
        'receiver_id',
        'rec_email',
        'topic',
        'description',
        'sending_profile',
        'receiving_profile',
    ];
}
