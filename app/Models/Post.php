<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory ,SoftDeletes;
    protected $guarded = [];
    // parent category
    public function relationCategory()
    {
        return $this->belongsTo(Category::class, 'parent_category_id', 'id');
    }
    // sub category
    public function relationSubCategories()
    {
        return $this->belongsToMany(SubCategory::class , 'subcategory_post', 'post_id', 'subcategory_id')->withTimestamps();
    }
    // tags
    public function relationTags()
    {
        return $this->belongsToMany(Tags::class , 'tags_post', 'post_id', 'tag_id')->withTimestamps();
    }
}
