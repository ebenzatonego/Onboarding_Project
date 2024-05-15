<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log_video_news extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'log_video_news';

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
    protected $fillable = ['news_id', 'user_id', 'log'];

    
}
