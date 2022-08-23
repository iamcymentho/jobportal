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

                         <div class="form-group ">
            <label for="title" class="form-label">Title:</label>
            <input type="text" name="title" class="form-control mb-3">


           <label for="description" class="form-label">Description:</label>
           <textarea name="description" id="description" class="form-control mb-3" cols="30" rows="5" name="description" class="form-control" placeholder="Enter job description"></textarea>

            
           <label for="roles" class="form-label">Roles:</label>
           <textarea name="roles" id="roles" class="form-control mb-3" cols="30" rows="3" name="roles" class="form-control" placeholder="States roles"></textarea>


            <label for="category" class="form-label">Category:</label>
            <select name="category" id="category" class="form-select mb-3">

                    <option value="">select category</option>

                    @foreach (App\Models\Category::all() as $category)

                        <option value="{{ $category->id }}">{{ $category->name }}</option>    
                    @endforeach
            </select>


            <label for="position" class="form-label">Position:</label>
            <input type="text" name="position" class="form-control mb-3">

            <label for="address" class="form-label">Address:</label>
            <input type="text" name="address" class="form-control mb-3">


            <label for="position" class="form-label">Type:</label>
            <select name="type" id="type" class="form-control mb-3">

                <option value="">Select employment type</option>
                <option value="fulltime">Fulltime</option>
                <option value="parttime">Part-time</option>
                <option value="casual">Casual</option>

            </select>


            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control mb-3">

                <option value="">Select status </option>
               
                <option value="1">Live</option>
                <option value="2">Draft</option>

            </select>

             <label for="lastdate" class="form-label">Last Date:</label>
            <input type="date" name="last_date" class="form-control mb-3">


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
