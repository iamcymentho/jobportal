@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <div class="card shadow">



                <div class="card-header bg-dark text-white text-center">
                    <h5>Create a job listing</h5>
                </div>

                <div class="card-body">

                   
                    <form action="{{ route('jobs.store') }}" method="POST">
                        @csrf

                        @if (Session::has('message'))
                        <div class="alert alert-success mb-3">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                         <div class="form-group mb-3">
            <label for="title" class="form-label"><b>Title:</b></label>
            <input type="text" name="title"  class="form-control @error('title') is-invalid @enderror">

             @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
           @enderror

                         </div>

          

            <div class="form-group mb-3">

                <label for="description" class="form-label"><b>Description:</b></label>
           <textarea name="description" id="description" class="form-control  @error('description') is-invalid @enderror" cols="30" rows="5"  placeholder="Enter job description"></textarea>

           @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
           @enderror

            </div>

          

            <div class="form-group mb-3">

                <label for="roles" class="form-label"><b>Roles:</b></label>
           <textarea name="roles" id="roles" class="form-control @error('description') is-invalid @enderror" cols="30" rows="3" name="roles" class="form-control" placeholder="States roles"></textarea>

            @error('roles')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
           @enderror

            </div>
           

          


           <div class="form-group mb-3">

             <label for="category" class="form-label"><b>Category:</b></label>
            <select name="category" id="category" class="form-select  @error('category') is-invalid @enderror">

                    <option value="">select category</option>

                    @foreach (App\Models\Category::all() as $category)

                        <option value="{{ $category->id }}">{{ $category->name }}</option>    
                    @endforeach
            </select>


             @error('category')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
           @enderror

           </div>


            <div class="form-group mb-3">

                <label for="position" class="form-label"><b>Position:</b></label>
            <input type="text" name="position" class="form-control @error('position') is-invalid @enderror">

              @error('position')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
           @enderror

            </div>


           <div class="form-group mb-3">

             <label for="address" class="form-label"><b>Address:</b></label>
            <input type="text" name="address" class="form-control  @error('address') is-invalid @enderror">

             @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
           @enderror

           </div>


           <div class="form-group mb-3">

             <label for="type" class="form-label"><b>Type:</b></label>
            <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">

                <option value="">Select employment type</option>
                <option value="fulltime">Fulltime</option>
                <option value="parttime">Part-time</option>
                <option value="casual">Casual</option>

            </select>

             @error('type')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
           @enderror

           </div>


           <div class="form-group mb-3">

             <label for="status" class="form-label"><b>Status</b></label>
            <select name="status" id="status" class="form-control @error('type') is-invalid @enderror">

                <option value="">Select status </option>
               
                <option value="1">Live</option>
                <option value="2">Draft</option>

            </select>

             @error('status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
           @enderror

           </div>


             <div class="form-group mb-3">

                <label for="last_date" class="form-label"><b>Last Date:</b></label>
            <input type="date" name="last_date" class="form-control mb-3  @error('type') is-invalid @enderror">

                 @error('last_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
           @enderror

             </div>

                <div class="grid gap-2">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>



                </div>

                    </form>
                   
              
            {{-- card body ends here --}}
           </div>
           {{-- card ends here --}}
           </div>
        </div>
    </div>
</div>
@endsection
