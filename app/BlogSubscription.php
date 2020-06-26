<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogSubscription extends Model
{
    public static function add($email)
    {
        $sub = new static();
        $sub->email = $email;
        $sub->save();

        return $sub;
    }

    public function generateToken()
    {
        $this->token = Str::random(100);
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
