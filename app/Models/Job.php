<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
