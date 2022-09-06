@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">

         

        <div class="col-md-3">
           <div class="card mt-5 shadow">
            <div class="card-header bg-secondary text-white">
                <h5>Update profile picture</h5>
            </div>

             <div class="card-body">

                {{-- if the profile picture column  in the database is empty , display the avatar , else display the profile picture --}}

                @if (empty(Auth::user()->profile->avatar))
                    
                <img src="{{ asset('avatar/man.jpg') }}" alt="profile picture" width="250px" class="mt-3 shadow">

                @else

                <img src="{{ asset('/uploads/avatar/') }}/{{ Auth::user()->profile->avatar }}" alt="profile picture" width="300px" class="mt-3 shadow img-fluid">

                @endif

                <form action="{{ route('avatar') }}" method="POST" enctype="multipart/form-data">
                            @csrf
            
                       <div class="input-group mb-3 mt-4">
                        <input type="file" class="form-control" id="avatar"  name="avatar">
                        <label class="input-group-text" for="avatar" >Upload</label>

                         @error('avatar')
                    <div class="text-danger"><b>{{ $message }}</b></div>
                        @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit" name="update" id="update">Update profile picture</button>
                        </div>

                        </form>
                {{-- card body ends here --}}
             </div>
            {{-- card ends here --}}
           </div>
        </div>

        

        <div class="col-md-5">

            @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif

            <div class="card  mt-5 shadow">
                <div class="card-header bg-secondary text-white">
                    <h5 class="card-title">Update Profile</h5>
                </div>

                <form action="{{ route('profile.create') }}" method="POST">
                @csrf
                
                

                <div class="card-body">
                    <div class="form-group mt-4">
                        <label for="address" class="form-label"><b>Address</b></label>
                        <input type="text" class="form-control" placeholder="Enter address" name="address" value="{{ Auth::user()->profile->address }}">

                        @error('address')
                    <div class="text-danger"><b>{{ $message }}</b></div>
                        @enderror
                    </div>

                     <div class="form-group mt-4">
                        <label for="phone_number" class="form-label"><b>Phone Number</b></label>
                        <input type="number" class="form-control" placeholder="Enter phone numner" name="phone_number" value="{{ Auth::user()->profile->phone_number }}">

                         @error('phone_number')
                    <div class="text-danger"><b>{{ $message }}</b></div>
                        @enderror
                    </div>

                     <div class="form-group mt-3">
                        <label for="experience" class="form-label mt-3"><b>Experience</b></label>
                        <textarea name="experience" id="experience" cols="30" rows="5" class="form-control" placeholder="The work experience section should include detailed and relevant information related to your job history.">{{ Auth::user()->profile->experience }}</textarea>

                         @error('experience')
                    <div class="text-danger"><b>{{ $message }}</b></div>
                        @enderror
                       
                    </div>

                     <div class="form-group mt-3">
                        <label for="bio" class="form-label mt-3"><b>Bio</b></label>
                        <textarea name="bio" id="bio" cols="30" rows="5" class="form-control" placeholder="Introduce yourself. Determine the shortlist of talents and interests.">{{ Auth::user()->profile->bio }}</textarea>

                         @error('bio')
                    <div class="text-danger"><b>{{ $message }}</b></div>
                        @enderror
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Update profile</button>
                    </div>

                   

                    </form>

                    {{-- card body ends here --}}
                </div>

                {{-- card ends here --}}
            </div>
        </div>


            <div class="col-md-4">
                <div class="card mt-5 shadow">

                    <div class="card-header bg-secondary text-white">
                        <h5>Your Information</h5>
                    </div>

                    <div class="card-body">
                <p><b>Name:</b>  {{ Auth::user()->name }}</p>
                <hr class="text-muted">
                <p><b>Email:</b>  {{ Auth::user()->email }}</p>
                <hr class="text-muted">
                <p><b>Phone Number:</b>  {{ Auth::user()->profile->phone_number }}</p>
                <hr class="text-muted">
                <p><b>Gender:</b> {{ Auth::user()->profile->gender }}</p>
                <hr class="text-muted">
                <p><b>Date Of Birth:</b> {{ Auth::user()->profile->dob }}</p>
                <hr class="text-muted">
                <p><b>Address:</b> {{ Auth::user()->profile->address }}</p>
                <hr class="text-muted">
                <p><b>Membership:</b> {{ date('F, d ,Y', strtotime(Auth::user()->profile->created_at)) }} - till date</p>
                <hr class="text-muted">

                {{-- <p><b>Joined:</b> {{ Auth::user()->profile->created_at->diffForHumans() }}</p> --}}


                {{-- Fetching the cover letter for download from the database --}}
                @if (!empty(Auth::user()->profile->cover_letter))

                <p><b>Cover letter:</b> <a href="{{ Storage::url(Auth::user()->profile->cover_letter) }}">Download cover letter here</a></p>
                 
                @else
                <p>Please upload cover letter</p>
                @endif

                <hr>
                
                {{-- fetching the resume for download from the database --}}
                @if (!empty(Auth::user()->profile->resume))

                <p><b>Resume:</b> <a href="{{ Storage::url(Auth::user()->profile->resume) }}">Download resume here</a></p>
                  
                @else
                <p>Please upload resume</p>
                @endif

                {{-- card body ends here --}}
                    </div>
                    {{-- card ends here --}}
                </div>


                <div class="card mt-3 shadow">

                    <div class="card-header bg-secondary text-white">
                        <h5>Update cover letter</h5>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('cover.letter') }}" method="POST" enctype="multipart/form-data">
                            @csrf
            
                       <div class="input-group mb-3 mt-4">
                        <input type="file" class="form-control" id="coverletter"  name="coverletter">
                        <label class="input-group-text" for="coverletter" >Upload</label>
                        </div>

                         @error('coverletter')
                    <div class="text-danger"><b>{{ $message }}</b></div>
                        @enderror

                        <div class="float-end">
                            <button class="btn btn-primary" type="submit" name="update" id="update" class="">Update</button>

                        </div>

                        </form>
                    {{-- card body ends here --}}
                </div>

                {{-- card ends here --}}
            </div>

            <div class="card mt-3 shadow">
                 <div class="card-header bg-secondary text-white">
                        <h5>Update resume</h5>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('user.resume') }}" method="POST" enctype="multipart/form-data">
                            @csrf
            
                       <div class="input-group mb-3 mt-4">
                        <input type="file" class="form-control" id="resume"  name="resume">
                        <label class="input-group-text" for="resume" >Upload</label>

                        </div>
                        
                         @error('resume')
                    <div class="text-danger"><b>{{ $message }}</b></div>
                        @enderror

                        <div class="float-end">
                            <button class="btn btn-primary" type="submit" name="update" id="update">Update</button>
                        </div>

                        </form>
                        {{-- card body ends here --}}
                    </div>

                    {{-- card ends here --}}
            </div>
        {{-- row ends here --}}
    </div>
</div>
@endsection
