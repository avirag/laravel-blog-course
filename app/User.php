<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use GrahamCampbell\Markdown\Facades\Markdown;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'slug', 'bio'
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
        return $this->hasMany(Post::class, 'author_id');
    }

    public function avatar()
    {
        $email = $this->email;
        $default = "https://www.brightfind.com/images/services/design/icon-design-users.png";
        $size = 80;

        return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;

    }

    public function getBioHtmlAttribute()
    {
        return $this->bio ? Markdown::convertToHtml(e($this->bio)) : null;
    }

    public function setPasswordAttribute($value)
    {
        if(!empty($value)) {
            $this->attributes['password'] = bcrypt($value);
        }
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


}
