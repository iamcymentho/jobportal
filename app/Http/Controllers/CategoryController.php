<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index($id)
    {

        $jobs = Job::where('category_id', $id)->Simplepaginate(5);

        $categoryName = Category::where('id', $id)->first();

        return view('jobs.jobs-category', compact('jobs', 'categoryName'));
    }
}
