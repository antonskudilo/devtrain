<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    protected $fillable = ['title'];

    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function posts()
    {
        return $this->belongsToMany(
            BlogPost::class,
            'blog_post_blog_tags',
            'blog_tag_id',
            'blog_post_id'
        );
    }
}
