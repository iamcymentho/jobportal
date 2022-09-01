<?php

namespace App\Http\Controllers;

use App\Mail\SendJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //
    public function send(Request $request)
    {
        // // validating email form
        // $this->validate($request, [

        //     'your_name' => 'required' | 'string',
        //     'your_email' => 'required' | 'email',

        //     'friend_name' => 'required' | 'string',
        //     'friend_email' => 'required' | 'email',

        // ]);

        // getting the full link to mail a friend . The home url is needed , then the job ID and slug. All will be joined together with concatenation.

        $homeUrl = url('/');
        $jobId = $request->get('job_id');
        $jobSlug = $request->get('job_slug');

        $jobUrl = $homeUrl . '/' . 'jobs/' . $jobId . '/' . $jobSlug;

        $data = array(

            'your_name' => $request->get('your_name'),

            'your_email' => $request->get('your_email'),

            'friend_name' => $request->get('friend_name'),

            'jobUrl' => $jobUrl,

            // 'friend_email' => $request->get('friend_email'),
        );

        try {

            // trying to catch email error and display to users in a readable form

            $emailTo = $request->get('friend_email');
            Mail::to($emailTo)->send(new SendJob($data));

            return redirect()->back()->with('message', 'Email was sent successfully to' . ' ' . $emailTo);
        } catch (\Exception $e) {

            return redirect()->back()->with('err_message', 'Unable to send email. Try again in a few minutes');
        }
    }
}
