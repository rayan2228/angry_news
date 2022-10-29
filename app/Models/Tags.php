<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;;

class Tags extends Model
{
    protected $guarded = [];
    use HasFactory;
    // posts
    public function relationPosts()
    {
        return $this->belongsToMany(Post::class, 'tags_post', 'tag_id', 'post_id')->withTimestamps();
    }

}
