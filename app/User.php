<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    const NO_AVATAR = '/img/no-avatar.png';
    const IS_ADMIN = 1;
    const IS_NOT_ADMIN = 0;
    const IS_BANNED = 1;
    const IS_NOT_BANNED = 0;


    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(BlogPost::class);
    }

    public function comments()
    {
        return $this->hasMany(BlogComment::class);
    }

//methods

    public static function add($fields)
    {
        $user = new static;
        $user->fill($fields);
        $user->password = bcrypt($fields['password']);
        $user->save();

        return $user;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->password = bcrypt($fields['password']);
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

    public function uploadAvatar($image)
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

    public function getAvatar()
    {
        return ($this->image) ?  ('/uploads/' . $this->image) : self::NO_AVATAR;
    }

    public function makeAdmin()
{
    $this->is_admin = self::IS_ADMIN;
    $this->save();
}

    public function makeNotAdmin()
    {
        $this->is_admin = self::IS_NOT_ADMIN;
        $this->save();
    }

    public function toggleAdmin($value)
    {
        return ($value) ? $this->makeNotAdmin() : $this->makeAdmin();
    }

    public function ban()
    {
        $this->is_admin = self::IS_BANNED;
        $this->save();
    }

    public function unban()
    {
        $this->is_admin = self::IS_NOT_BANNED;
        $this->save();
    }

    public function toggleBan($value)
    {
        return ($value) ? $this->unban() : $this->ban();
    }
}
