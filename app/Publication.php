<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Publication extends Model
{
    use Notifiable;

    protected $fillable = [
        'user_id', 'title', 'content'
    ];

    public function path()
    {
        return '/publications/' . $this->id;
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function userName()
    {
        $user = User::find($this->id)->publications;
        $name = $user->name;
        return $name;
    }

    public function partOfText($size)
    {
        if(strlen($this->content) <= $size) {
            return $this->content;
        } else {
            $part = substr($this->content, 0, $size);
            return $part . ' . . .';
        }
    }
}
