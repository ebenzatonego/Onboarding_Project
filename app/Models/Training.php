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
    protected $fillable = ['title', 'detail', 'training_type_id', 'photo', 'video', 'user_like', 'user_dislike', 'user_share', 'user_fav', 'user_view', 'highlight_number','sum_rating','log_rating','creator','status','datetime_start','datetime_end','log_video'];
    
}
