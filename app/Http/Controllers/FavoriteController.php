<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class FavoriteController extends Controller
{
    //
    public function savejob(Request $request)
    {
        // $jobId = Job::find($id);
        // $jobId->favourites()->attach(auth()->user()->id);
        // return redirect()->back();


        $favourites = new Job();
        $favourites->user_id = $request->user_id;
        $favourites->job_id = $request->job_id;

        // dd($job->user_id);

        $favourites->save();
        // return response()->json(['success' => 'Application sent successfully']);


        return redirect()->back()->with('message', 'Application sent successfully');
    }

    public function unsavejob($id)
    {
        $jobId = Job::find($id);
        $jobId->favourites()->detach(auth()->user()->id);
        return redirect()->back();
    }
}
