@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">

         

        <div class="col-md-3">
           <div class="card mt-5 shadow">
            <div class="card-header bg-secondary text-white">
                <h5>Update Company Logo</h5>
            </div>

             <div class="card-body">

                {{-- if the profile picture column  in the database is empty , display the avatar , else display the profile picture --}}

                @if (empty(Auth::user()->company->logo))
                    
                <img src="{{ asset('avatar/man.jpg') }}" alt="profile picture" width="250px" class="mt-3 shadow">

                @else

                <img src="{{ asset('uploads/logo')}}/{{ Auth::user()->company->logo }}" alt="company logo" width="300px" class="mt-3 shadow img-fluid">

                @endif

                <form action="{{ route('company.logo') }}" method="POST" enctype="multipart/form-data">
                            @csrf
            
                       <div class="input-group mb-3 mt-4">
                        <input type="file" class="form-control" id="companylogo"  name="companylogo">
                        <label class="input-group-text" for="companylogo" >Upload</label>

                         @error('companylogo')
                    <div class="text-danger"><b>{{ $message }}</b></div>
                        @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-success" type="submit" name="update" id="update">Update profile picture</button>
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
                    <h5 class="card-title">Update Company Details</h5>
                </div>

                <form action="{{ route('company.store') }}" method="POST">
                @csrf
                
                

                <div class="card-body">
                    {{-- card body starts here --}}
                    <div class="form-group mt-4">
                        <label for="address" class="form-label"><b>Address</b></label>
                        <input type="text" class="form-control" placeholder="Enter address" name="address" value="{{ Auth::user()->company->address }}">

                        @error('address')
                    <div class="text-danger"><b>{{ $message }}</b></div>
                        @enderror
                    </div>


                    <div class="form-group mt-4">
                        <label for="phone" class="form-label"><b>Company Number</b></label>
                        <input type="number" class="form-control" placeholder="Enter company phone number" name="phone" value="{{ Auth::user()->company->phone }}">

                        @error('phone')
                    <div class="text-danger"><b>{{ $message }}</b></div>
                        @enderror
                    </div>

                    <div class="form-group mt-4">
                        <label for="website" class="form-label"><b>Website</b></label>
                        <input type="text" class="form-control" placeholder="Enter company website" name="website" value="{{ Auth::user()->company->website }}">

                        @error('website')
                    <div class="text-danger"><b>{{ $message }}</b></div>
                        @enderror
                    </div>

                    <div class="form-group mt-4">
                        <label for="slogan" class="form-label"><b>Slogan</b></label>
                        <input type="text" class="form-control" placeholder="Enter company slogan" name="slogan" value="{{ Auth::user()->company->slogan }}">

                        @error('slogan')
                    <div class="text-danger"><b>{{ $message }}</b></div>
                        @enderror
                    </div>

                    <div class="form-group mt-4">
                        <label for="description" class="form-label"><b>Description</b></label>
                        <textarea name="description" id="description" class="form-control" placeholder="Tell us about your company or organization. Interating the vision , mission and values to mention a  few" cols="50" rows="10">{{ Auth::user()->company->description }}</textarea>

                        @error('description')
                    <div class="text-danger"><b>{{ $message }}</b></div>
                        @enderror
                    </div>

                    

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-success">Update profile</button>
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
                        <h5>Company Information</h5>
                    </div>

                    <div class="card-body">

                        <p><b>Company Name:</b> {{ Auth::user()->company->company_name }}</p>
                        <hr class="text-muted">

                        <p><b> Website:</b> <a href="{{ Auth::user()->company->website }}">{{ Auth::user()->company->website }}</a></p>
                        <hr class="text-muted">

                        <p><b> Address:</b> {{ Auth::user()->company->address }}</p>
                        <hr class="text-muted">

                        <p><b>Tel:</b> {{ Auth::user()->company->phone}}</p>
                        <hr class="text-muted">

                        <p><b> Slogan:</b> {{ Auth::user()->company->slogan }}</p>
                        <hr class="text-muted">

                        <p class=""><b>Company page:</b>
                            <a href="company/{{ Auth::user()->company->slug }}">click here to view</a>
                        </p>

                
                {{-- card body ends here --}}
                    </div>
                    {{-- card ends here --}}
                </div>


                <div class="card mt-3 shadow">

                    <div class="card-header bg-secondary text-white">
                        <h5>Update cover photo</h5>
                    </div>

                    <div class="card-body">

                        {{-- updating company's cover photo / banner --}}

                        <form action="{{ route('cover.photo') }}" method="POST" enctype="multipart/form-data">
                            @csrf
            
                       <div class="input-group mb-3 mt-4">
                        <input type="file" class="form-control" id="coverphoto"  name="coverphoto">
                        <label class="input-group-text" for="coverphoto" >Upload</label>
                        </div>

                         @error('coverphoto')
                    <div class="text-danger"><b>{{ $message }}</b></div>
                        @enderror

                        <div class="float-end">
                            <button class="btn btn-success" type="submit" name="update" id="update" class="">Update</button>

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
