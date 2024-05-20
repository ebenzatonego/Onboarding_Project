<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class My_goal_user extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'my_goal_users';

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
    protected $fillable = ['user_id', 'my_goals_type_id', 'date_start', 'date_end', 'period'];

    
}
