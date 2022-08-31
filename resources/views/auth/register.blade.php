@extends('layouts.main')
@section('content')
   <div class="album text-muted">
     <div class="container">
       <div class="row">
         <h1>Candidate Registration</h1>   
         

    

    <div class="site-section bg-light ps-3  mt-5 ms-3 mb-5">
      <div class="container">

        
         <div class="text-center  section-heading">
                <h2 class="text-muted mt-4 ">{{ __('JOB SEEKER REGISTRATION') }}</h2>  
            </div>
        <div class="row">
       {{-- @if(Session::has('message'))
                 <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif --}}

          <div class="col-md-12 col-lg-7 mb-5 mt-5 shadow p-3 m-3">
          
            <form method="POST" action="" class="p-5 bg-white">
                        @csrf

                         {{-- sending over a user type of "SEEKER" to the database in an hidden input type. This shows that the current user registering with the form is seeking to be employed better still , seeking employment opportunites . He or she isnt an employer but a SEEKER --}}

                        <input type="hidden" value="seeker" name="user_type">

                        <div class="form-group row">
                    
                            <div class="col-md-12">{{ __('Full Name') }}</div>

                            <div class="col-md-12">
                                 <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                    
                            <div class="col-md-12">{{ __('Email Address') }}</div>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                         <div class="form-group row">
                    
                            <div class="col-md-12">{{ __('Date Of Birth') }}</div>

                            <div class="col-md-12">
                               <input id="datepicker" type="text" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>

                                @if ($errors->has('dob'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                    
                            <div class="col-md-12">{{ __('Password') }}</div>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-12">{{ __('Confirm Password') }}</div>

                            <div class="col-md-12">
                                 <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                         <div class="form-group row">
                             <label for="password" class="col-md-4 col-form-label text-md-end form-check-label">{{ __('Gender') }}</label>

                            <div class="col-md-12">
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <input type="radio" name="gender" value="male" required="" class="form-check-input">
                               <label class="form-check-label" for="male">
                                   Male
                                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                <input type="radio" name="gender" value="female" required="" class="form-check-input">
                               <label class="form-check-label" for="female">
                                   Female
                                </label>

                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




              <div class="row form-group">
                <div class="col-md-12 text-center mt-3">
                   <button type="submit" class="btn btn-primary">
                                    {{ __('Register as a seeker') }}
                                </button>
                </div>
              </div>

  
            </form>
          </div>

          <div class="col-lg-4">
            
            
            <div class="p-4 mb-3 bg-white mt-5 shadow">
              <h3 class="h5 text-black mb-3">More Info</h3>
              <p>Once you create an account a verification link will be sent to your email.</p>
              <p><a href="#" class="btn btn-primary  py-2 px-4">Learn More</a></p>
            </div>

             <div class="p-4 mb-3 bg-white mt-5 shadow">
              <h3 class="h5 text-black mb-3">More Info</h3>
              <p>We sih you the best of luck as you embark on a journey to secure your dream job</p>
              <p><a href="#" class="btn btn-primary  py-2 px-4">Learn More</a></p>
            </div>

             <div class="p-4 mb-3 bg-white mt-5 shadow">
              <h3 class="h5 text-black mb-3">More Info</h3>
              <p>Want to switch careers? Enlighten yourself about the well sought after skills out there before making a decision.</p>
              <p><a href="#" class="btn btn-primary  py-2 px-4">Learn More</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>



     </div>
   </div>
@endsection
