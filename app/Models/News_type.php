<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News_type extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news_types';

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
    protected $fillable = ['name_type', 'number_menu', 'check_highlight'];

    
}
