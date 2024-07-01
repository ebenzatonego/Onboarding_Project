<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log_excel_user extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'log_excel_users';

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
    protected $fillable = ['name_file', 'link_file', 'user_id','type'];

    
}
