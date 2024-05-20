<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career_path extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'career_paths';

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
    protected $fillable = ['name_rank', 'number_story', 'title_story', 'description_story', 'photo_story', 'user_view'];

    
}
