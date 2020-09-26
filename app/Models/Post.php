<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    public function user () {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function tags () {
        return $this->belongsToMany('App\Models\Tag', 'post_tag', 'post_id', 'tag_id');
    }
}
