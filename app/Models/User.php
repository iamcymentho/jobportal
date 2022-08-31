<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Profile;
use App\Models\Company;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Events\Registered;

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
        'user_type'
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

    public function profile()
    {

        // This states the relationship bettwen users and profile. A user , be it a a job seeker or an employer can only have one profile
        return $this->hasOne(Profile::class);
    }

    public function Company()
    {
        // This states the relationship bettwen users and company. A which in this case is an employer can only have one company
        return $this->hasOne(Company::class);
    }

    public function favorites()
    {
        // This states the relationship bettwen users and job.  In this case  many users can apply for a job.
        return $this->belongsToMany(Job::class, 'favorites', 'user_id', 'job_id')->withTimestamps();
    }
}
