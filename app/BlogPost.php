<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    const RECOMMENDED = 1;
    const STANDARD = 0;
    const DRAFT = 0;
    const PUBLIC = 1;
    const NO_IMAGE = '/img/no-img.png';


    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category()
    {
        return $this->hasOne(BlogCategory::class);
    }

    public function author()
    {
        return $this->hasOne(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(
            BlogTag::class,
            'blog_post_blog_tags',
            'blog_post_id',
            'blog_tag_id'
        );
    }

//    methods

    protected $fillable = ['title', 'description', 'content'];

    public static function add($fields)
    {
        $post = new static;
        $post->fill($fields);
        $post->user_id = 1;
        $post->save();

        return $post;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        try {
            Storage::delete('uploads/' . $this->image);
            $this->delete();
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }

    public function uploadImage($image)
    {
        if ($image == null) {
            return;
        }
        Storage::delete('uploads/' . $this->image);
        $filename = Str::random(10) . '.' . $image->extension();
        $image->saveAs('uploads', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function setCategory($id)
    {
        if ($id == null) {
            return;
        }
        $this->blog_category_id = $id;
        $this->save();
    }

    public function setTags($ids)
    {
        if ($ids == null) {
            return;
        }
        $this->tags()->sync($ids);
    }

    public function setDraft()
    {
        $this->status = self::DRAFT;
        $this->save();
    }

    public function setPublic()
    {
        $this->status = self::PUBLIC;
        $this->save();
    }

    public function toggleStatus($value)
    {
        return ($value) ? $this->setDraft() : $this->setPublic();
    }

    public function setRecommended()
    {
        $this->is_recommended = self::RECOMMENDED;
        $this->save();
    }

    public function setStandard()
    {
        $this->is_recommended = self::STANDARD;
        $this->save();
    }

    public function toggleRecommended($value)
    {
        return ($value) ? $this->setStandard() : $this->setRecommended();
    }

    public function getImage()
    {
        return ($this->image) ?  ('/uploads/' . $this->image) : self::NO_IMAGE;
    }
}
