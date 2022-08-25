<?php

namespace App\Models;

use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Job extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function company()
    {

        // relationship between job and company
        return $this->belongsTo(Company::class);
    }

    protected $fillable = [

        'user_id',
        'company_id',
        'title',
        'slug',
        'description',
        'roles',
        'category_id',
        'position',
        'address',
        'type',
        'status',
        'last_date',
    ];


    public function users()
    {
        // This states the relationship bettwen users and job.  In this case  many users can apply for a job.
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
