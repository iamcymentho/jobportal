<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\Company;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\JobPostRequest;




class JobPortalController extends Controller
{


    public function __construct()
    {
        $this->middleware('employer', ['except' => array('index', 'show', 'apply', 'allJobs')]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jobs = Job::latest()->limit(10)->where('status', 1)->get();

        // trying to figure out how many jobs has each category from the database taking category and job relationship into account

        $categories = Category::with('jobs')->get();

        $companies = Company::get()->random(12);

        return view('welcome', compact('jobs', 'companies', 'categories'));
    }


    public function edit($id)
    {
        $jobs = Job::findOrFail($id);

        return view('editjob', compact('jobs'));
    }




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
            'number_of_vacancy' => request('number_of_vacancy'),
            'gender' => request('gender'),
            'experience' => request('experience'),
            'salary' => request('salary'),

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
        $jobRecommendations = $this->jobRecommendations($job);

        return view('jobs.show', compact('job', 'jobRecommendations'));
    }


    public function jobRecommendations($job)
    {

        $data = [];

        //recommending jobs based on categories
        $jobBasedOnCategories = Job::latest()
            ->where('category_id', $job->category_id)
            ->whereDate('last_date', '>', date('Y-m-d'))
            ->where('id', '!=', $job->id)
            ->where('status', 1)
            ->limit(5)
            ->get();

        array_push($data, $jobBasedOnCategories);


        $jobBasedOnCompany = Job::latest()
            ->where('company_id', $job->company_id)
            ->whereDate('last_date', '>', date('Y-m-d'))
            ->where('id', '!=', $job->id)
            ->where('status', 1)
            ->limit(5)
            ->get();

        array_push($data, $jobBasedOnCompany);

        $jobBasedOnPosition = Job::latest()
            ->where('position', 'LIKE', '%' . $job->position . '%')
            // ->whereDate('last_date', '>', date('Y-m-d'))
            ->where('id', '!=', $job->id)
            ->where('status', 1)
            ->limit(5);
        // ->get();

        array_push($data, $jobBasedOnPosition);


        // avoiding repeatition of data
        $collection = collect($data);
        $unique = $collection->unique('id');
        $jobRecommendations = $unique->values()->first();

        return $jobRecommendations;

        // return view('jobs.show', compact('job', 'jobRecommendations'));

        // dd($jobBasedOnPosition);
        // dd($job->position);
        // dd($jobBasedOnCompanies);
        // dd($job->company_id);
        // dd($jobBasedOnCategories);
        // return ($data);

        // return view('jobs.show', compact('job'));

        // // dd($jobBasedOnCategories);

        // return view('jobs.show', compact('job'));   

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



    public function apply(Request $request, $id)
    {

        $jobId = JOb::find($id);
        $jobId->users()->attach(Auth()->user()->id);


        return redirect()->back()->with('message', 'Application sent successfully');
    }

    public function applicant()
    {

        $appliedjobs = Job::getApplicants();

        return view('jobs.applicants', compact('appliedjobs'));
    }

    public function allJobs(Request $request)
    {
        //implementing front filtering / search bar for front page
        $search = $request->get('search');
        $address = $request->get('address');

        if ($search && $address) {

            $jobs = Job::where('position', 'LIKE', '%' . $search . '%')
                ->Orwhere('title', 'LIKE', '%' . $search . '%')
                ->Orwhere('type', 'LIKE', '%' . $search . '%')
                ->Orwhere('address', 'LIKE', '%' . $address . '%')
                ->Simplepaginate(10);

            return view('jobs.alljobs', compact('jobs'));
        }


        // $keyword = request('title');

        // trying to implement filtering / search bar(s)

        $keyword = $request->get('title');
        $type = $request->get('type');
        $category = $request->get('category_id');
        $address = $request->get('address');

        // dd($keyword, $type, $category, $address);

        // checking to see if the search button has been clicked

        if ($keyword || $type || $category || $address) {

            $jobs = Job::where('title', 'LIKE', '%' . $keyword . '%')
                ->Orwhere('type', $type)
                ->Orwhere('category_id', $category)
                ->Orwhere('address', $address)
                ->Simplepaginate(10);

            return view('jobs.alljobs', compact('jobs'));
        } else {

            $jobs = Job::latest()->Simplepaginate(10);
            return view('jobs.alljobs', compact('jobs'));
        }
    }

    // // seeing all users that applied for a job in a company
    // public function applicant()
    // {
    //     $applicants = Job::has('users')->where('user_id', auth()->user()->id);


    //     return view('jobs.applicants', compact('applicants'));
    // }

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
