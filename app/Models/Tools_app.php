<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tools_app extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tools_apps';

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
    protected $fillable = ['name', 'type', 'photo_icon', 'link_ios', 'click_link_ios', 'link_android', 'click_link_android','detail','number'];

    
}
