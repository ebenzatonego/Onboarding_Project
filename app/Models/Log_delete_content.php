<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log_delete_content extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'log_delete_contents';

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
    protected $fillable = ['type', 'user_id', 'news_name', 'training_name', 'product_name', 'appointment_name', 'activity_name','career_path_content_name'];

    
}
