<?php

namespace App;

use App\Traits\Friendable;
use Laravel\Scout\Searchable;
use Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use Friendable;
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'slug', 'avatar'
    ];

    public function profile(){
        return $this->hasOne('App\Profile');
    }


    public function posts(){
        return $this->hasMany('App\post')
                ->orderBy('created_at');
    }

    public function getAvatarAttribute($avatar){

        return asset(Storage::url($avatar));

    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
