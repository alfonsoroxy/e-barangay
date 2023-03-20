<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $fillable = [
        'first_name',
        'last_name',
        'mname',
        'suffix',
        'houseNumber',
        'streetName',
        'birthday',
        'nationality',
        'gender',
        'maritalStatus',
        'contact',
        'email',
        'password',
        'is_admin',
        'image',
        'terms',
        'is_resident',
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
    ];

    protected $table = "users";

    public function getAge()
    {
        $format = '%y years old';
        return \Carbon\Carbon::parse(auth()->user()->birthday)->diff(\Carbon\Carbon::now())->format($format);
    }

    public function countFemale()
    {
        return $countFemale = User::where('is_admin', 'USR')->where('gender', 'Female')->count();
    }

    public function countMale()
    {
        return $countMale = User::where('is_admin', 'USR')->where('gender', 'Male')->count();
    }

    // 20 - 39
    public function countAdult()
    {
        return $adult = User::where('is_admin', 'USR')->whereRaw('TIMESTAMPDIFF(YEAR, birthday, CURDATE()) <= 39')->get();
    }

    // 40 - 59
    public function countMiddleAge()
    {
        return $middleAge = User::where('is_admin', 'USR')->whereRaw('TIMESTAMPDIFF(YEAR, birthday, CURDATE()) >= 40')->get();
    }

    //60 - 100
    public function countOldAge()
    {
        return $oldAge = User::where('is_admin', 'USR')->whereRaw('TIMESTAMPDIFF(YEAR, birthday, CURDATE()) >= 60')->get();
    }
}
