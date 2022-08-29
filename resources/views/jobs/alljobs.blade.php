@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">

        <form action="{{ route('alljobs') }}" method="GET">

           <div class="row mt-4">

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

  <div class="col-sm-3">
    <label class="visually-hidden" for="title">Employment type</label>
     <select name="type" id="type" class="form-select ">

                <option value="">Select employment type</option>
                <option value="fulltime">Fulltime</option>
                <option value="parttime">Part-time</option>
                <option value="casual">Casual</option>

            </select>
  </div>

  <div class="col-sm-3">
    <label class="visually-hidden" for="title">Enter category</label>
    <select name="category_id" id="category" class="form-select ">

                    <option value="">select category</option>

                    @foreach (App\Models\Category::all() as $category)

                        <option value="{{ $category->id }}">{{ $category->name }}</option>    
                    @endforeach
            </select>
  </div>

  <div class="col-sm-3">
    <label class="visually-hidden" for="title">Location</label>
    <input type="text" class="form-control" id="address" name="address" placeholder="e.g Ikeja,Lagos">
  </div>

  <div class="col-auto">
    <button type="submit" class="btn btn-outline-success">Search</button>
  </div>

  
  {{-- row ends here --}}
           </div>

           </form>


        <h3 class="mt-4">Recent Jobs</h3>
        <hr>
        <table class="table table-striped table-bordered table-hover shadow">
            <thead>
                <th></th>
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

        </table>

       
       
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
</style>
