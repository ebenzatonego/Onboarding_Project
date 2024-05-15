<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log_video_tools_tutorial extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'log_video_tools_tutorials';

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
    protected $fillable = ['tools_tutorial_id', 'user_id', 'log'];

    
}
