<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use Sluggable;

    const RECOMMENDED = 1;
    const STANDARD = 0;
    const DRAFT = 0;
    const PUBLIC = 1;
    const NO_IMAGE = '/img/no-img.png';
    const NO_CATEGORY = 'Без категории';
    const NO_TAGS = 'Без тегов';

    protected $fillable = ['title', 'description', 'content', 'date'];

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
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
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
            $this->removeImage();
            $this->delete();
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }

    public function removeImage() {
        if ($this->image != null) {
            Storage::delete('uploads/' . $this->image);
        }
    }

    public function uploadImage($image)
    {
        if ($image == null) {
            return;
        }
        $this->removeImage();

        Storage::delete('uploads/' . $this->image);
        $filename = Str::random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
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

    public function getCategory()
    {
        return ($this->category) ? ($this->category->title) : self::NO_CATEGORY;
    }

    public function getTags()
    {
        return (!$this->tags->isEmpty()) ? implode(', ', $this->tags->pluck('title')->all()) : self::NO_TAGS;

    }

//    public function setDateAttribute($value)
//    {
//        $date = Carbon::createFromFormat('m/d/y', $value)->format('Y-m-d');
//        $this->attributes['date'] = $date;
//    }
}
