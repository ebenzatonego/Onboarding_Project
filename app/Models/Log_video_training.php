<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log_video_training extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'log_video_trainings';

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
    protected $fillable = ['training_id', 'user_id', 'log'];

    
}
