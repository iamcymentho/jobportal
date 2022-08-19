@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row j">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>{{ $job->title }}</b></div>

                <div class="card-body">
                  <p>
                    
                    <h3 class="mb-4">JOB DESCRIPTION</h3>
                    {{ $job->description }}
                
                </p>

                  <p>

                    <h4>DUTIES:</h4>
                    {{ $job->roles }}
                </p>
                </div>

                {{-- card ends here --}}
            </div>
        </div>

        <div class="col-md-4">

            <div class="card">
                <div class="card-header text-center">
                    <b>{{ __('Brief Information') }}</b>
                </div>


                <div class="card-body">
                  <p>
                         <b>Company:</b> 

                         {{-- making use of the company & job relationship --}}

                         <a href="{{ route('company.index', [$job->company->id, $job->company->slug]) }}">  
                         {{ $job->company->company_name }}
                   
                            </a>
                </p>


                  <p><b>Address:</b> &nbsp; {{ $job->address }}</p>
                   <p><b>Employment Type:</b>&nbsp; {{ $job->type }}</p>
                    <p><b>Position:</b>&nbsp; {{ $job->position }}</p>
                     <p><b>Date:</b>&nbsp; {{ $job->created_at->diffForHumans() }}</p>
                </div>

                {{-- card ends here --}}
            </div>

            @if (Auth::check() && Auth::user()->user_type='seeker')
                {{-- checking if the user is logged in before the apply button gets displayed --}}
            
           <div class="d-grid">
             <button class="btn btn-success mt-3">Apply</button>
           </div>
        </div>

        @endif
        
    </div>
</div>



@endsection
