<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact_area_supervisor extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contact_area_supervisors';

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
    protected $fillable = ['area', 'name', 'nickname', 'account', 'organization_name', 'phone', 'email','photo'];

    
}
