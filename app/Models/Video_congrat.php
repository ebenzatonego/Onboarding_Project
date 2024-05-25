<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video_congrat extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'video_congrats';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name_video', 'type', 'for_rank', 'user_id', 'status', 'log','video'];

    
}
