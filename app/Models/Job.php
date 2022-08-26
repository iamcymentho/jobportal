<?php

namespace App\Models;


use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
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


    public function checkJobApplication()
    {


        // checking to see if a user who's logged in, already applied for a job and disable the apply button if yes...
        $result = DB::table('job_user')->where('user_id', auth()->user()->id)->where('job_id', $this->id)->exists();

        return  $result;
    }
}
