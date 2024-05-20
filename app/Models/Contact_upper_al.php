<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact_upper_al extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contact_upper_als';

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
    protected $fillable = ['name', 'nickname', 'account', 'organization_name', 'phone', 'email'];

    
}
