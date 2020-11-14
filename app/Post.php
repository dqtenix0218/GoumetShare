<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $guarded=['id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function likedBy($user)
    {
        return Like::where('user_id', $user->id)->where('post_id', $this->id);
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function scopeSearch($query, $str)
    {
        $query->where('genre', 'like', '%' . $str . '%')
            ->orwhere('caption', 'like', '%' . $str . '%')
            ->orWhere('place', 'like', '%' . $str . '%');

        return $query;
    }

    public function scopeGetPostsByUserId($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }

}
