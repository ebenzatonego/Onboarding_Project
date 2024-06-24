<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career_path_content extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'career_path_contents';

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
    protected $fillable = ['career_path_id', 'title', 'icon', 'read', 'recommend', 'detail', 'pdf_file', 'photo', 'video', 'number', 'user_download_pdf', 'user_view', 'log_video','photo_gallery','cretor'];

    
}
