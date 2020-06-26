<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    const IS_ALLOWED = 1;
    const IS_DISALLOWED = 0;

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post()
    {
        return $this->belongsTo(BlogPost::class, 'blog_post_id');
    }

    public function allow()
    {
        $this->status = self::IS_ALLOWED;
        $this->save();
    }

    public function disallow()
    {
        $this->status = self::IS_DISALLOWED;
        $this->save();
    }

    public function toggleStatus()
    {
        return ($this->status) ? $this->disallow() : $this->allow();
    }

    public function remove()
    {
        try {
            $this->delete();
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }
}
