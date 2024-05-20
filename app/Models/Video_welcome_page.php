<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video_welcome_page extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'video_welcome_pages';

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
    protected $fillable = ['name_video', 'type', 'user_id', 'status', 'log','video'];

    
}
