<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content_popup extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'content_popups';

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
    protected $fillable = ['title', 'detail', 'photo', 'video', 'user_id', 'status', 'log_video', 'user_view' ,'type'];

    
}
