<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    /**
     * Get the user that owns the SubCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function relationCategory()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    // posts
    public function relationPosts()
    {
        return $this->belongsToMany(Post::class, 'subcategory_post', 'subcategory_id', 'post_id')->withTimestamps();
    }

}
