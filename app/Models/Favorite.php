<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'favorites';

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
    protected $fillable = ['type', 'user_id', 'status', 'news_id', 'training_id', 'product_id', 'appointment_id'];

    
}
