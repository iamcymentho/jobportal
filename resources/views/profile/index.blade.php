@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-2">
            <img src="{{ asset('avatar/man.jpg') }}" alt="profile picture" width="200px" class="mt-5">
        </div>

        <div class="col-md-6">

             @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif

            <div class="card ms-5 mt-5 shadow">
                <div class="card-header">
                    <h3 class="card-title">Update Profile</h3>
                </div>

                <form action="{{ route('profile.create') }}" method="POST">
                @csrf
                
                

                <div class="card-body">
                    <div class="form-group">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" placeholder="Enter address" name="address">
                    </div>

                     <div class="form-group">
                        <label for="experience" class="form-label mt-3">Experience</label>
                        <textarea name="experience" id="experience" cols="30" rows="5" class="form-control" placeholder="The work experience section should include detailed and relevant information related to your job history."></textarea>
                       
                    </div>

                     <div class="form-group">
                        <label for="bio" class="form-label mt-3">Bio</label>
                        <textarea name="bio" id="bio" cols="30" rows="5" class="form-control" placeholder="Introduce yourself. Determine the shortlist of talents and interests."></textarea>
                    </div>

                    <div class="form-group mt-3">
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

                    <div class="card-header">
                        <h5>Your Information</h5>
                    </div>

                    <div class="card-body">
                        User Details
                    </div>
                    {{-- card ends here --}}
                </div>


                <div class="card mt-3 shadow">

                    <div class="card-header">
                        <h5>Update cover letter</h5>
                    </div>

                    <div class="card-body">
            
                       <div class="input-group mb-3 mt-4">
                        <input type="file" class="form-control" id="coverletter"  name="coverletter">
                        <label class="input-group-text" for="coverletter" >Upload</label>
                        </div>

                        <div class="float-end">
                            <button class="btn btn-primary" type="submit" name="update" id="update" class="">Update</button>

                        </div>
                    {{-- card ends here --}}
                </div>
            </div>

            <div class="card mt-3 shadow">
                 <div class="card-header">
                        <h5>Update resume</h5>
                    </div>

                    <div class="card-body">
            
                       <div class="input-group mb-3 mt-4">
                        <input type="file" class="form-control" id="coverletter"  name="coverletter">
                        <label class="input-group-text" for="coverletter" >Upload</label>
                        </div>

                        <div class="float-end">
                            <button class="btn btn-primary" type="submit" name="update" id="update">Update</button>
                        </div>

                        {{-- card body ends here --}}
                    </div>

                    {{-- card ends here --}}
            </div>
        {{-- row ends here --}}
    </div>
</div>
@endsection
