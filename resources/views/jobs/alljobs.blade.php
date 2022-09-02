@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.main')

@section('content')
<div class="container ">

    <div class="row mysearch">
         <form action="{{ route('alljobs') }}" method="GET">

           <div class="row mt-4 mb-4 bg-light p-3 shadow"  >

            {{-- <div class="col-md-3">
                <div class="form-group">
                    <label for="title" class="form-label">Keyword</label>
                    <input type="text" class="form-control" placeholder="Enter keyword" name="title">
                </div>
            </div>
            row ends here --}}

            

             <div class="col-sm-2">
    <label class="visually-hidden" for="title">Keyword</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Enter keyword">
  </div>

  <div class="col-sm-3 mt-2">
    <label class="visually-hidden form-label" for="type">Employment type</label>

     <select name="type" id="type" class="custom-select">

                <option value="">Select employment type</option>
                <option value="fulltime">Fulltime</option>
                <option value="parttime">Part-time</option>
                <option value="casual">Casual</option>

            </select>
  </div>

  <div class="col-sm-3 mt-2">
    <label class="visually-hidden" for="category_id">Enter category</label>
    <select name="category_id" id="category_id" class="custom-select">

                    <option value="">select category</option>

                    @foreach (App\Models\Category::all() as $category)

                        <option value="{{ $category->id }}">{{ $category->name }}</option>    
                    @endforeach
            </select>
  </div>

  <div class="col-sm-3">
    <label class="visually-hidden" for="address">Location</label>
    <input type="text" class="form-control" id="address" name="address" placeholder="e.g Ikeja,Lagos">
  </div>

  <div class="d-grid gap-2">
        
    <button type="submit" class="btn btn-outline-success myrealsearch">Search</button>
  
  </div>


  
  {{-- row ends here --}}
           </div>

           </form>
    </div>


    <div class="row bg-light alljobs" >

       
                <div class="myrecent section-heading mb-3">
                    <h3 class="mt-4 text-muted ">RECENT JOBS</h3>
                </div>
                
        <hr>
        {{-- <table class="table table-striped table-bordered table-hover shadow">
           

            <tbody>
                @if (count($jobs)>0)
                    
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

                @else
                <td class="alert alert-info p-3" colspan="">No available jobs matches your description</td>
                @endif

                
            </tbody>

        </table> --}}

        <div class="col-md-12">

         <div class="rounded border jobs-wrap shadow">

                @if (count($jobs)>0)

                @foreach ($jobs as $job )   

              <a href="{{ route('jobs.show', [$job->id, $job->slug]) }}" class="job-item d-block d-md-flex align-items-center  border-bottom fulltime">
                
                <div class="company-logo blank-logo text-center text-md-left pl-3">
                  <img src="{{ asset('uploads/logo') }}/{{ $job->company->logo }}" alt="Image" class="img-fluid mx-auto">
                </div>
                <div class="job-details h-100">
                  <div class="p-3 align-self-center">
                    <h3>{{ $job->position }}</h3>
                    <div class="d-block d-lg-flex">
                      <div class="mr-3"><span class="icon-suitcase mr-1"></span>{{ $job->company->company_name }}</div>
                      <div class="mr-3"><span class="icon-room mr-1"></span> {{ str::limit($job->address, 20) }}</div>
                      <div><span class="icon-money mr-1"></span> {{ $job->salary }}</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

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

                  <div class="p-3">
                    <span class="text-danger p-2 rounded border border-danger">{{ $job->type }}</span>
                  </div>

                  @elseif($job->type == 'part-time')

                   <div class="p-3">
                    <span class="text-info p-2 rounded border border-info">{{ $job->type }}</span>
                  </div>

                  @else
                   <div class="p-3">
                    <span class="text-warning p-2 rounded border border-warning">{{ $job->type }}</span>
                  </div>

                  @endif
                </div>  
              </a>

              
              @endforeach

               @else
                {{-- <td class="alert alert-info p-3" colspan="">No available jobs matches your description</td> --}}

                <div class="p-3 text-center">
                    <span class="p-2 rounded text-danger "><b>No available jobs matches your description</b></span>
                  </div>
                @endif

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
</style>


