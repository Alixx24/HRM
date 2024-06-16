<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Request;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    static public function getRecord()
    {
        $return = self::select('users.*');

        //search box start
       if(!empty(Request::get('id')))
       {
        $return = $return->where('id', '=', Request::get('id'));
       }
       if(!empty(Request::get('name')))
       {
        $return = $return->where('name', 'like', '%' .Request::get('name'). '%');
       }
       if(!empty(Request::get('last_name')))
       {
        $return = $return->where('last_name','like', '%' .Request::get('last_name'). '%');
       }
       if(!empty(Request::get('email')))
       {
        $return = $return->where('email','like', '%' .Request::get('email'). '%');
       }
       //search box end

       $return = $return->orderBy('id', 'desc')
       ->paginate(2);
       return $return;

    }
}
