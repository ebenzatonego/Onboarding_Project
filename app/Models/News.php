<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news';

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
    protected $fillable = ['title', 'detail', 'news_type_id', 'photo_cover', 'photo_gallery', 'video', 'user_like', 'user_dislike', 'user_share', 'user_fav', 'user_view', 'sum_rating', 'log_rating', 'highlight_number','select_content_show'];
    
}
