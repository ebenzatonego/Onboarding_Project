<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'activitys';

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
    protected $fillable = ['title', 'detail', 'photo', 'activity_type_id', 'all_day', 'date_start', 'date_end', 'time_start', 'time_end', 'location_detail', 'link_map', 'user_like', 'user_dislike', 'user_share', 'user_fav', 'user_view', 'sum_rating', 'log_rating', 'highlight_number','creator','status','datetime_start','datetime_end','highlight_of_type'];

    
}
