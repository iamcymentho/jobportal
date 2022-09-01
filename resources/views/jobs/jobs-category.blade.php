@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.main')

@section('content')
<div class="container ">

    {{-- {{ dd($categoryName->name) }} --}}
    

    <div class="row ">

        <div class="alljobs mx-auto mb-5 section-heading">
            <h2 class="text-muted">{{ $categoryName->name }}</h2>
        </div>
   
        {{-- <table class="table table-striped table-bordered table-hover  shadow">
           
            <thead >
                <th> </th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </thead>

            <tbody>
                
                @foreach ($jobs as $job )       
                <tr>
                    <td><img src="{{ asset('uploads/logo') }}/{{ $job->company->logo }}" alt="" width="80" class="shadow"></td>

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

        </table> --}}


         <div class="col-md-12">

         <div class="rounded border jobs-wrap shadow">


                @foreach ($jobs as $job )   

              <a href="{{ route('jobs.show', [$job->id, $job->slug]) }}" class="job-item d-block d-md-flex align-items-center  border-bottom fulltime">
                
                <div class="company-logo blank-logo text-center text-md-left pl-3">
                  <img src="{{ asset('uploads/logo') }}/{{ $job->company->logo }}" alt="Image" class="img-fluid mx-auto">
                </div>
                <div class="job-details h-100">
                  <div class="p-3 align-self-center">
                    <h3>{{ $job->position }}</h3>
                    <div class="d-block d-lg-flex">
                      <div class="mr-3"><span class="icon-suitcase mr-1"></span>{{ $job->type }}</div>
                      <div class="mr-3"><span class="icon-room mr-1"></span> {{ str::limit($job->address, 20) }}</div>
                      

                      <div>

                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="royalblue" d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10s10-4.486 10-10S17.514 2 12 2zm3.293 14.707L11 12.414V6h2v5.586l3.707 3.707l-1.414 1.414z"/></svg>
                        <span class=" mr-1"></span> {{ $job->created_at->diffForHumans() }}
                    
                    </div>
                    </div>
                  </div>
                </div>
                <div class="job-category align-self-center">

                    {{-- changing the color of the button based on the job type --}}

                    @if($job->type == 'full-time')

                  <div class="">
                    <span class="text-danger p-2 rounded border border-danger">{{ $job->type }}</span>
                  

                  
                    <span class="text-danger p-2 rounded border border-danger">Apply</span>
                  </div>

                  @elseif($job->type == 'part-time')

                  
                    
                    <div class="">
                     <span class="text-info p-2 rounded border border-info ">{{ $job->type }}</span>
                  
                    <span class="text-info p-2 rounded border border-info ">Apply</span>
                    </div>
                 
                   

                  @else
                   <div class="p-3">
                    <span class="text-warning p-2 rounded border border-warning">{{ $job->type }}</span>
                  </div>

                  <div class="p-3">
                    <span class="text-warning p-2 rounded border border-warning">Apply</span>
                  </div>

                  @endif
                </div>  
              </a>

              
              @endforeach


            </div>

            {{-- col ends here --}}
            </div>


       
       
    </div>

  <div class="mt-4  mb-5">
  <div class="row">
    <div class="col-md-4 mx-auto">

        
         
         {{ $jobs->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}
   
    </div>
  </div>
  </div>
      
    
    {{-- container ends here --}}
</div>


@endsection

<style>
    .fa{
        color: #4183D7;
    }

    .mysearch{
        position:relative;
        top: 195px;
    }

    .alljobs{
        margin-top: 200px;
    }

    .myrealsearch{
        margin-top: 40px;
    }

    .myrecent{
        margin-left: 500px;
    }

    .mybutton{
        margin-left: 10px;
    }
</style>


