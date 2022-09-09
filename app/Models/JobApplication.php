<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobApplication extends Model
{
    use HasFactory;

    protected $key = 'job_applications';

    public function users()
    {
        // This states the relationship bettwen users and job.  In this case  many users can apply for a job.
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
