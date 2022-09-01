<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;

class Category extends Model
{
    use HasFactory;

    // getting the number of jobs a category has using eloquent relationships
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
