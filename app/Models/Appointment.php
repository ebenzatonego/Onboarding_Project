<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'appointments';

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
    protected $fillable = ['title', 'detail', 'photo', 'type', 'training_type_id', 'all_day', 'date_start', 'date_end', 'time_start', 'time_end', 'user_like', 'user_dislike', 'user_share', 'user_fav', 'user_view', 'location_detail', 'link_map', 'link_out', 'click_link_out','appointment_area_id','sum_rating','log_rating','creator','status','datetime_start','datetime_end'];
}
