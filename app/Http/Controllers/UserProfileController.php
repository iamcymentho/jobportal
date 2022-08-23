<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Validation\ValidationData;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $this->validate($request, [

            'address' => 'required',
            'experience' => 'required | min:20',
            'bio' => 'required | min:20',
            'phone_number' => 'required | min:10 | numeric',

        ]);

        //getting the current logged in user id
        $user_id = auth()->user()->id;

        Profile::where('user_id', $user_id)->update([

            'address' => request('address'),
            'phone_number' => request('phone_number'),
            'experience' => request('experience'),
            'bio' => request('bio'),
        ]);

        return redirect()->back()->with('message', 'Profile successfully updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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



    /**
     * Store cover letter storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCoverLetter(Request $request)
    {
        // Validation
        $this->validate($request, [

            'coverletter' => 'required | mimes: pdf, docs, docx | max: 50000',
        ]);

        //getting the current logged in user id
        $user_id = auth()->user()->id;

        // getting the file name then store in public files in the storage folder 
        $filename = $request->file('coverletter')->store('public/files');

        Profile::where('user_id', $user_id)->update([

            // accessing the column "cover_letter" in the database
            'cover_letter' => $filename,

        ]);

        return redirect()->back()->with('message', 'Cover letter successfully updated');
    }


    /**
     * Store  resume storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function storeResume(Request $request)
    {
        // Validation
        $this->validate($request, [

            'resume' => 'required | mimes: pdf, docs, docx | max: 50000',
        ]);
        //getting the current logged in user id
        $user_id = auth()->user()->id;

        // getting the file name then store in public resumes in the storage folder 
        $filename = $request->file('resume')->store('public/resumes');

        Profile::where('user_id', $user_id)->update([

            // accessing the column "resume" in the database
            'resume' => $filename,

        ]);

        return redirect()->back()->with('message', 'Resume successfully updated');


        // to link both storage files , run a php command , "php artisan storage:link"
    }

    /**
     * Store  profile picture storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProfilePicture(Request $request)
    {
        // Validation
        $this->validate($request, [

            'avatar' => 'required | mimes: png, jpg, jpeg | max: 50000',
        ]);

        //getting the current logged in user id
        $user_id = auth()->user()->id;

        // check to see if file is being uploaded
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            // getting the extention of the file with a laravel inbuilt function "getClientOriginalExtension"
            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;
            $file->move('uploads/avatar/', $filename);

            Profile::where('user_id', $user_id)->update([

                // accessing the column "resume" in the database
                'avatar' => $filename,

            ]);

            return redirect()->back()->with('message', 'Profile picture successfully updated');
        }
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
