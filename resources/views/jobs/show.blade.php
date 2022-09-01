@php
    use Illuminate\Support\Str;
@endphp

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
                <h2 class="text-muted">{{$job->title}}</h2> 

          </div>

      <img src="{{asset('avatar/hero-job-image.jpg')}}" style="width: 100%;" class="mt-4 mb-5 shadow">

          <div class="col-lg-7 shadow m-2">

            {{-- email success message --}}
            
           <div class="mt-3">
             @if (Session::has('message'))
              
            <div class="alert alert-info alert-dismissible fade show" role="alert">
              
              <strong>{{ Session::get('message') }}</strong>
            
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
            </div>

           

            @endif
           </div>


           {{-- email error message --}}

            <div class="mt-3">
             @if (Session::has('err_message'))
              
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              
              <strong>{{ Session::get('err_message') }}</strong>
            
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
            </div>

           

            @endif
           </div>

            <div class="p-4 mb-8 bg-white mt-5 ">
              <!-- icon-book mr-3-->
              <h3 class="h5 text-black mb-4">
                
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 15 15"><path fill="green" d="M14 1v12H1V8.72a.5.5 0 0 1 .17-.37l3-3.22a.5.5 0 0 1 .83.38v3l3.16-3.37a.5.5 0 0 1 .84.37V11h3V1h2z"/></svg>
                
                Description 
                
                <a href="#"data-toggle="modal" data-target="#exampleModal1" >
                
                {{-- <i class="fa fa-envelope-square" style="font-size: 34px;float:right;color:green;"></i> --}}

                
                <svg xmlns="http://www.w3.org/2000/svg" style="float: right; " width="3em" height="2em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1536 1536"><path fill="green" d="M1248 0q119 0 203.5 84.5T1536 288v960q0 119-84.5 203.5T1248 1536H288q-119 0-203.5-84.5T0 1248V288Q0 169 84.5 84.5T288 0h960zm32 1056V620q-31 35-64 55q-34 22-132.5 85T932 859q-98 69-164 69t-164-69q-47-32-142-92.5T320 674q-12-8-33-27t-31-27v436q0 40 28 68t68 28h832q40 0 68-28t28-68zm0-573q0-41-27.5-70t-68.5-29H352q-40 0-68 28t-28 68q0 37 30.5 76.5T354 621q47 32 137.5 89T621 793q3 2 17 11.5t21 14t21 13t23.5 13T725 854t22.5 7.5T768 864t20.5-2.5T811 854t21.5-9.5t23.5-13t21-13t21-14t17-11.5l267-174q35-23 66.5-62.5T1280 483z"/></svg>
              
               </a></h3>

              <p> {{$job->description}}.</p>
              
            </div>

            <div class="p-4 mb-8 bg-white">
              <!--icon-align-left mr-3-->
              <h3 class="h5 text-black mb-3">
                
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"><path fill="green" d="M28.5 32a3.476 3.476 0 0 1-2.475-1.025l-4.128-4.128a6.496 6.496 0 0 1-7.348-8.956l.588-1.34l4.156 4.156a1.023 1.023 0 0 0 1.413 0a.999.999 0 0 0 .001-1.414l-4.156-4.157l1.34-.588a6.497 6.497 0 0 1 8.956 7.349l4.128 4.128A3.5 3.5 0 0 1 28.5 32Zm-6.03-7.409l4.97 4.97a1.535 1.535 0 0 0 2.12 0a1.498 1.498 0 0 0 0-2.121l-4.969-4.97l.188-.583A4.496 4.496 0 0 0 20.5 16q-.126 0-.25.007l1.872 1.872a3 3 0 0 1 0 4.242a3.072 3.072 0 0 1-4.243 0l-1.872-1.872Q16 20.374 16 20.5a4.497 4.497 0 0 0 5.888 4.28Z"/><path fill="green" d="M25 5h-3V4a2.006 2.006 0 0 0-2-2h-8a2.006 2.006 0 0 0-2 2v1H7a2.006 2.006 0 0 0-2 2v21a2.006 2.006 0 0 0 2 2h7v-2H7V7h3v3h12V7h3v5h2V7a2.006 2.006 0 0 0-2-2Zm-5 3h-8V4h8Z"/></svg>
                
                Roles and Responsibilities</h3>
              <p>{{$job->roles}} .</p>
              
            </div>

             <div class="p-4 mb-8 bg-white">
              <!--icon-align-left mr-3-->
              <h3 class="h5 text-black mb-3">
                
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="green" d="M10.501 11.724L.631 7.16c-.841-.399-.841-1.014 0-1.376l9.87-4.563c.841-.399 2.194-.399 2.998 0l9.87 4.563c.841.398.841 1.014 0 1.376l-9.87 4.563c-.841.362-2.194.362-2.998 0zm0 5.468l-9.87-4.563c-.841-.399-.841-1.014 0-1.376l3.363-1.558l6.507 3.006c.841.398 2.194.398 2.998 0l6.507-3.006l3.363 1.558c.841.398.841 1.014 0 1.376l-9.87 4.563c-.841.398-2.194.398-2.998 0zm0 0L.631 12.63c-.841-.399-.841-1.014 0-1.376l3.363-1.558l6.507 3.006c.841.398 2.194.398 2.998 0l6.507-3.006l3.363 1.558c.841.398.841 1.014 0 1.376l-9.87 4.563c-.841.398-2.194.398-2.998 0zm0 5.613l-9.87-4.563c-.841-.398-.841-1.014 0-1.376l3.436-1.593l6.398 2.97c.84.398 2.193.398 2.997 0l6.398-2.97l3.436 1.593c.841.4.841 1.014 0 1.376l-9.87 4.563c-.768.362-2.12.362-2.925 0z"/></svg>
                
                Position</h3>
              <p>{{$job->position}} .</p>
              
            </div>

            <div class="p-4 mb-8 bg-white">
              <h3 class="h5 text-black mb-3">
                
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="green" d="M10.021 1.021h6v2h-6zM20.04 7.41l1.434-1.434l-1.414-1.414l-1.433 1.433A8.989 8.989 0 0 0 7.53 5.881l1.42 1.44a7.038 7.038 0 0 1 4.06-1.3l.01.001v6.98l4.953 4.958A7.001 7.001 0 0 1 6.01 13.021h3l-4-4l-4 4h3A9 9 0 1 0 20.04 7.41Z"/></svg>

                Number of vacancy</h3>
              <p>{{$job->number_of_vacancy }} .</p>
              
            </div>
            <div class="p-4 mb-8 bg-white">
              <h3 class="h5 text-black mb-3">
                
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 40 40"><g fill="green"><path d="M36.389 4.962h-5.906a.446.446 0 0 0-.446.446c0 .076.024.144.057.206v3.398a.947.947 0 0 1-.948.948h-1.838a.88.88 0 0 1-.88-.88V5.669a.435.435 0 0 0 .094-.261a.445.445 0 0 0-.446-.446H14.171a.446.446 0 0 0-.446.446c0 .069.019.132.047.191v3.437a.925.925 0 0 1-.925.925h-1.632a.934.934 0 0 1-.934-.934V5.624a.432.432 0 0 0 .063-.216a.445.445 0 0 0-.446-.446H3.675a.993.993 0 0 0-.992.991v29.534c0 .548.445.993.992.993h32.714a.993.993 0 0 0 .991-.993V5.953a.993.993 0 0 0-.991-.991zm0 30.626H3.675a.1.1 0 0 1-.1-.101V13.214h32.913v22.272a.1.1 0 0 1-.099.102z"/><path d="M12.147 8.944c.246 0 .446-.2.446-.446V2.5a.446.446 0 1 0-.892 0v5.999c0 .246.2.445.446.445zm16.154 0c.246 0 .446-.2.446-.446V2.5a.446.446 0 1 0-.892 0v5.999c0 .246.199.445.446.445z"/><circle cx="9.842" cy="17.503" r="2.458"/><circle cx="16.906" cy="17.503" r="2.458"/><circle cx="23.969" cy="17.503" r="2.458"/><circle cx="9.842" cy="24.348" r="2.458"/><circle cx="16.906" cy="24.348" r="2.458"/><circle cx="23.969" cy="24.348" r="2.458"/><circle cx="9.842" cy="31.193" r="2.458"/><circle cx="16.906" cy="31.193" r="2.458"/><circle cx="23.969" cy="31.193" r="2.458"/><circle cx="30.867" cy="17.503" r="2.458"/><circle cx="30.867" cy="24.348" r="2.458"/><circle cx="30.867" cy="31.193" r="2.458"/></g></svg>
                
                
                Experience</h3>
              <p>{{$job->experience}}&nbsp;years</p>
              
            </div>
            <div class="p-4 mb-8 bg-white">
              <h3 class="h5 text-black mb-3">
                
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"><path fill="green" d="M22 3v2h3.563l-3.375 3.406A6.962 6.962 0 0 0 18 7c-1.87 0-3.616.74-4.938 2.063a6.94 6.94 0 0 0 .001 9.875c.87.87 1.906 1.495 3.062 1.812c.114-.087.242-.178.344-.28a3.45 3.45 0 0 0 .874-1.532a4.906 4.906 0 0 1-2.875-1.407C13.524 16.588 13 15.336 13 14s.525-2.586 1.47-3.53C15.412 9.523 16.664 9 18 9s2.587.525 3.53 1.47A4.956 4.956 0 0 1 23 14c0 .865-.245 1.67-.656 2.406c.096.516.156 1.058.156 1.594c0 .498-.042.99-.125 1.47c.2-.163.378-.348.563-.532C24.26 17.614 25 15.87 25 14c0-1.53-.504-2.984-1.406-4.188L27 6.438V10h2V3h-7zm-6.125 8.25c-.114.087-.242.178-.344.28c-.432.434-.714.96-.874 1.533c1.09.14 2.085.616 2.875 1.406c.945.943 1.47 2.195 1.47 3.53s-.525 2.586-1.47 3.53C16.588 22.477 15.336 23 14 23s-2.587-.525-3.53-1.47A4.948 4.948 0 0 1 9 18c0-.865.245-1.67.656-2.406A8.789 8.789 0 0 1 9.5 14c0-.498.042-.99.125-1.47c-.2.163-.377.348-.563.533C7.742 14.384 7 16.13 7 18c0 1.53.504 2.984 1.406 4.188L6.72 23.875l-2-2l-1.44 1.406l2 2l-2 2l1.44 1.44l2-2l2 2l1.405-1.44l-2-2l1.688-1.686A6.932 6.932 0 0 0 14 25c1.87 0 3.616-.74 4.938-2.063C20.26 21.616 21 19.87 21 18s-.74-3.614-2.063-4.938c-.87-.87-1.906-1.495-3.062-1.812z"/></svg>
                
                
                Gender</h3>
              <p>{{$job->gender}} </p>
              
            </div>
            <div class="p-4 mb-8 bg-white">
              <h3 class="h5 text-black mb-3">
                
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path fill="green" d="M10.6 9c-.4-.1-.8-.3-1.1-.6c-.3-.1-.4-.4-.4-.6c0-.2.1-.5.3-.6c.3-.2.6-.4.9-.3c.6 0 1.1.3 1.4.7l.9-1.2c-.3-.3-.6-.5-.9-.7c-.3-.2-.7-.3-1.1-.3V4H9.4v1.4c-.5.1-1 .4-1.4.8c-.4.5-.7 1.1-.6 1.7c0 .6.2 1.2.6 1.6c.5.5 1.2.8 1.8 1.1c.3.1.7.3 1 .5c.2.2.3.5.3.8c0 .3-.1.6-.3.9c-.3.3-.7.4-1 .4c-.4 0-.9-.1-1.2-.4c-.3-.2-.6-.5-.8-.8l-1 1.1c.3.4.6.7 1 1c.5.3 1.1.6 1.7.6V16h1.1v-1.5c.6-.1 1.1-.4 1.5-.8c.5-.5.8-1.3.8-2c0-.6-.2-1.3-.7-1.7c-.5-.5-1-.8-1.6-1zM10 2c-4.4 0-8 3.6-8 8s3.6 8 8 8s8-3.6 8-8s-3.6-8-8-8zm0 14.9c-3.8 0-6.9-3.1-6.9-6.9S6.2 3.1 10 3.1s6.9 3.1 6.9 6.9s-3.1 6.9-6.9 6.9z"/></svg>
                
                Salary</h3>
              <p>{{$job->salary}}</p>
            </div>

          </div>

          
            <div class="col-md-4 p-4 site-section bg-light shadow">
              <h3 class="h5 text-black mb-3 text-center mt-5">Short Info</h3>

                  <p><b>Company Name:</b>&nbsp; {{$job->company->company_name}}</p>

                <p><b>Address:</b>&nbsp;{{$job->address}}</p>

                    <p><b>Employment type:&nbsp;</b>{{$job->type}}</p>

                    <p><b>Position:</b>&nbsp;{{$job->position}}</p>

                    <p><b>Posted:</b>&nbsp;{{$job->created_at->diffForHumans()}}</p>

                    <p><b>Deadline:</b>&nbsp;{{ date('F d, Y', strtotime($job->last_date)) }}</p>



              <p class="mb-0"><a href="{{route('company.index',[$job->company->id,$job->company->slug])}}" class="btn btn-outline-success btn-lg mt-3" style="width: 100%;">Visit Company Page</a></p>

              @if (!Auth::check())

              <p class="m-0">You have to login to apply</p>
                  
              @endif


              {{-- <p>
        @if(Auth::check()&&Auth::user()->user_type=='seeker')
           

            @if(!$job->checkApplication())
            
            <apply-component :jobid={{$job->id}}></apply-component>
            @else
            <center><span style="color: #000;">You applied this job</span></center>
            @endif
<br>
            <favorite-component :jobid={{$job->id}} :favorited={{$job->checkSaved()?'true':'false'}}  ></favorite-component>
            @else
            Please login to apply this job

            @endif

              </p> --}}



               @if (Auth::check() && Auth::user()->user_type ='seeker' )
                {{-- checking if the user is logged in before the apply button gets displayed --}}

             @if (!$job->checkJobApplication())
               
             {{-- making use of the checkjobapplication function from the job model to disable the apply buitton if user already applied --}}
              

                <form action="{{ route('applications', [$job->id]) }}" method="POST">
                  @csrf

           <p class="mb-0">
            <a href="" class="btn btn-outline-success btn-lg mt-3" style="width: 100%;">Apply</a>
          </p>

           </form>

          

           @endif  
            @endif

</div>


{{-- recommendations section  go here --}}


<div class="row">


  @foreach($jobRecommendations as $jobRecommendation)
<div class="col-md-4 m-5">

  
<div class="card mt-5 shadow" style="width: 18rem;">
  <div class="card-body">
    <p class="badge badge-success">{{$jobRecommendation->type}}</p>
    <h5 class="card-title">{{$jobRecommendation->position}}</h5>
    <p class="card-text">{{str::limit($jobRecommendation->description,90)}}
    <a href="{{route('jobs.show',[$jobRecommendation->id,$jobRecommendation->slug])}}" class="btn btn-success mt-3">Apply</a>
  </div>
</div>

  {{-- col ends here --}}
</div>

@endforeach
  {{-- row ends here --}}
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success ">
        <h5 class="modal-title text-white mx-auto" id="exampleModalLabel">Mail job listing to a friend</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>   

      <form action="{{route('mail')}}" method="POST">
        @csrf

      <div class="modal-body">

        {{-- hidden input to send job ID and slug --}}

        <input type="hidden" name="job_id" value="{{$job->id}}">
        <input type="hidden" name="job_slug" value="{{$job->slug}}">

        <div class="form-goup">
          <label>Your name <span style="color: red"><b>*</b></span></label>
          <input type="text" name="your_name" class="form-control" required="">
        </div>
        <div class="form-goup">
          <label>Your email <span style="color: red"><b>*</b></span></label>
          <input type="email" name="your_email" class="form-control" required="">
        </div>
        <div class="form-goup">
          <label>Person name <span style="color: red"><b>*</b></span></label>
          <input type="text" name="friend_name" class="form-control" required="">
        </div>
        <div class="form-goup">
          <label>Person email <span style="color: red"><b>*</b></span></label>
          <input type="email" name="friend_email" class="form-control" required="">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Mail this job</button>
      </div>

      {{-- form ends here --}}
    </form>
    </div>
  </div>
</div>
               </div>
       

<br>
<br>
<br>

{{-- container ends here --}} 
     </div> 
   </div>
@endsection
