<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tools_contact extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tools_contacts';

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
    protected $fillable = ['phone', 'mail', 'type'];

    
}
