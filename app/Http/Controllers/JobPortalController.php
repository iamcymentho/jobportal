<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Company;
use Illuminate\Support\Str;
use App\Http\Requests\JobPostRequest;



class JobPortalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jobs = Job::all()->take(10);
        return view('welcome', compact('jobs'));
    }


    public function edit($id)
    {
        $jobs = Job::findOrFail($id);

        return view('editjob', compact('jobs'));
    }

    // public function edit($id, Job $job)
    // {
    //     //
    //     return view('jobs.edit', compact('job'));
    // }


    // public function edit(Job $job)
    // {
    //     //
    //     return view(
    //         'jobs.edit',
    //         [
    //             'job' => $job
    //         ]
    //     );
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jobs.create');
    }


    // public function editcreate()
    // {
    //     //
    //     return view('jobs.edit');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobPostRequest $request)
    {
        //getting the current logged in user id
        $user_id = auth()->user()->id;

        //getting the current company id  
        $company = Company::where('user_id', $user_id)->first();

        //refrencing the company 'ID' column in the database
        $company_id = $company->id;


        Job::create([


            'user_id' => $user_id,
            'company_id' => $company_id,
            'title' => request('title'),
            'slug' => Str::of('title')->slug('-'),
            'description' => request('description'),
            'roles' => request('roles'),
            'category_id' => request('category'),
            'position' => request('position'),
            'address' => request('address'),
            'type' => request('type'),
            'status' => request('status'),
            'last_date' => request('last_date'),

        ]);

        return redirect()->back()->with('message', 'Job listing successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Job $job)
    {
        //
        return view('jobs.show', compact('job'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function myjob()
    {


        $jobs = Job::where('user_id', Auth()->user()->id)->get();

        return view('jobs.myjob', compact('jobs'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
