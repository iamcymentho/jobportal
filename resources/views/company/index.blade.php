@extends('layouts.main')
@section('content')
   <div class="album text-muted">
     <div class="container">
      @if(Session::has('message'))

      <div class="alert alert-success">{{Session::get('message')}}</div>
      @endif
        @if(Session::has('err_message'))

      <div class="alert alert-danger">{{Session::get('err_message')}}</div>
      @endif

      @if(isset( $errors) && count($errors)>0)
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>

      @endif

       <div class="row" id="app">
          <div class="title" style="margin-top: 170px;">
                <h2 class="text-muted"></h2> 

          </div>

            <div class="mb-3">

                 {{-- Fetching the cover photo to display from the database --}}
                @if (empty(Auth::user()->company->cover_photo))

        <img src="{{ asset('cover/businessvector.jpg') }}" alt="company banner" width="100%" class="shadow mt-2" >

        @else
                <img src="{{ asset('uploads/coverphoto')}}/{{ Auth::user()->company->cover_photo }}" alt="company banner" width="100%" class="shadow" width=devicePixelRatio>

        @endif
                
            </div>

          <div class="col-lg-12  m-2 mb-5">
            
            
            {{-- <div class="p-4 mb-8 bg-white mt-5 ">
              <!-- icon-book mr-3-->
              <h3 class="h5 text-black mb-3"><i class="fa fa-book" style="color: blue;">&nbsp;</i>Description </h3>
              <p> </p>
              
            </div> --}}


             <div class="company-description mt-3">

                 @if (empty(Auth::user()->company->logo))
                    
                <img src="{{ asset('avatar/company_logo_blank.png') }}" alt="profile picture" width="250px" class="mt-3 shadow">

                @else

                <img src="{{ asset('uploads/logo')}}/{{ Auth::user()->company->logo }}" alt="company logo" width="300px" class="mt-3 shadow img-fluid">

                @endif

                 <p class="mt-3">{{ $company->description }}</p>

                <h2 class="text-decoration-underline">{{ $company->company_name }}</h2>

                <p class="mt-3"><b>Slogan :</b>&nbsp;{{ $company->slogan }} || <b>Address :</b>&nbsp;{{ $company->address }} || <b>Phone Number :</b>&nbsp;{{ $company->phone}} ||<b> Website :</b>&nbsp;{{ $company->website }}</p>
                
            </div>

            

              <h3 class="mt-5">All available roles at {{ $company->company_name }}</h3>
        <table class="table mb-4">

            <tbody>

                {{-- fetching all the jobs that belong to a particular company using the relationship in the COMPANY & JOB Model --}}
                
                @foreach ($company->jobs as $job )       
                <tr>
                    <td><img src="{{ asset('avatar/company_logo_blank.png') }}" alt="" width="80" class="shadow"></td>

                    <td>Position: {{ $job->position }}
                        <br><br>
                        <i class="fa fa-solid fa-clock"></i>&nbsp; {{ $job->type }}

                    </td>
                    <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; {{ $job->address }}</td>
                    <td><i class=" fa fa-solid fa-globe"></i>&nbsp; {{ $job->created_at->diffForHumans() }}</td>
                    <td>
                        <a href="{{ route('jobs.show', [$job->id, $job->slug]) }}">
                        <button class="btn btn-success btn-sm">Apply</button>
                    
                            </a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>

            
            
            
            

          </div>


     </div>
   </div>

      
@endsection

