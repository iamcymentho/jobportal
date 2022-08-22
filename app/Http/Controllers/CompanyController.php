<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, Company $company)
    {
        //
        return view('company.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //getting the current logged in user id
        $user_id = auth()->user()->id;

        Company::where('user_id', $user_id)->update([

            'address' => request('address'),
            'phone' => request('phone'),
            'website' => request('website'),
            'slogan' => request('slogan'),
            'description' => request('description'),
        ]);

        return redirect()->back()->with('message', 'Company details successfully updated');
    }


    // updating company cover photo

    public function coverPhoto(Request $request)
    {
        $user_id = auth()->user()->id;
        if ($request->hasFile('coverphoto')) {


            # code...
            $file = $request->file('coverphoto');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/coverphoto/', $filename);

            Company::where('user_id', $user_id)->update([

                'cover_photo' => $filename,
            ]);

            return redirect()->back()->with('message', 'Cover photo successfully updated');
        }
    }


    // updating company logo

    public function companyLogo(Request $request)
    {
        $user_id = auth()->user()->id;
        if ($request->hasFile('companylogo')) {


            # code...
            $file = $request->file('companylogo');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/logo/', $filename);

            Company::where('user_id', $user_id)->update([

                'logo' => $filename,
            ]);

            return redirect()->back()->with('message', 'Company logo successfully updated');
        }
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
