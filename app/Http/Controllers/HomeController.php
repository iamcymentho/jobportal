<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Job;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {

        $adminRole = Auth::user()->roles()->pluck('name');

        if ($adminRole->contains('admin')) {
            return redirect('/dashboard');
        }


        $allApplications = Job::getApplications();
        return view('home', compact('allApplications'));


        // return view('home');
    }
}
