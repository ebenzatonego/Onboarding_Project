<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'trainings';

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
    protected $fillable = ['name_article', 'type_article', 'start_date', 'end_date', 'start_time', 'end_time', 'check_all_day_start', 'check_all_day_end', 'detail', 'photo', 'link_video', 'link_lms', 'like', 'fav', 'share', 'user_view'];

    
}
