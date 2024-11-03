<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getAvatarPathAttribute()
    {
        return $this->avatar == null || $this->avatar == 'avatar.png' ? asset('https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y') : asset('storage/users/'.$this->avatar);
    }
}
