<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training_type extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'training_types';

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
    protected $fillable = ['type_article', 'number_menu', 'check_highlight','photo_menu','icon'];

    
}
