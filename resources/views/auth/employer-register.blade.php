@extends('layouts.main')
@section('content')
   <div class="album text-muted">
     <div class="container">
       <div class="row mb-5">
         <h1>{{ __('EMPLOYER REGISTRATION') }}</h1>   
         

    

    <div class="site-section bg-light">
      <div class="container">

         <div class="text-center section-heading">
                <h2 class="text-muted mt-4 ">{{ __('EMPLOYER REGISTRATION') }}</h2>  
            </div>

            @if(Session::has('message'))
                 <div class="alert alert-success mt-3">
                    {{Session::get('message')}}
                </div>
            @endif


        <div class="row">
    

          <div class="col-md-12 col-lg-7 mb-5 mt-5 m-2 shadow">

            
          
            <form method="POST" action="" class="p-5 bg-white">
                        @csrf

                         {{-- sending over a user type of "EMPLOYER" to the database in an hidden input type. This shows that the current user registering with the form is seeking to be employed better still , seeking employment opportunites . He or she isnt an employer but an EMPLOYER --}}

                        <input type="hidden" value="employer" name="user_type">
                        <div class="form-group row">
                    
                            <div class="col-md-12">{{ __('Company Name') }}</div>

                            <div class="col-md-12">
                                <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name" autofocus>

                                @if ($errors->has('company_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company_name') }}</strong>
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




              <div class="row form-group">
                <div class="col-md-12 mt-3">
                  <button type="submit" class="btn btn-primary">
                                    {{ __('Register as employer') }}
                                </button>
                </div>
              </div>

  
            </form>
          </div>

          <div class="col-lg-4 mt-5">
            
            
            <div class="p-4 mb-5 bg-white shadow">
              <h3 class="h5 text-black mb-3">More Info</h3>
              <p>Once you create an account a verification link will be sent to your email.</p>
              <p><a href="#" class="btn btn-primary  py-2 px-4">Learn More</a></p>
            </div>


            <div class="p-4  bg-white shadow mt-3">
              <h3 class="h5 text-black mb-3">More Info</h3>
              <p>Once you create an account a verification link will be sent to your email.</p>
              <p><a href="#" class="btn btn-primary  py-2 px-4">Learn More</a></p>
            </div>

          </div>
        </div>
      </div>
    </div>



     </div>
   </div>
@endsection
