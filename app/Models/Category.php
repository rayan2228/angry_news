<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    // sub category
    public function relationSubCategory()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }
    // posts
    public function relationPosts()
    {
        return $this->hasMany(Post::class,  'parent_category_id', 'id');
    }
}
