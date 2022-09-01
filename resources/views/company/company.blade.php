@extends('layouts.main')

@section('content')


<div class="container bg-light pr-5 mb-5">

    <div class="row">
        <div class="companies mx-auto mb-4 ">
            <h3 class="text-muted ">List Of Companies</h3>
        </div>
    </div>

    <div class="row ">

        

        @foreach ( $companies as $company )
            
        <div class="col-md-3">

           <div class="card p-2 " style="width: 18rem;">

        @if (empty(Auth::user()->company->logo))
                    
                <img src="{{ asset('avatar/man.jpg') }}" alt="profile picture" width="250px" class="mt-3 shadow img-fluid">

                @else

                <img src="{{ asset('uploads/logo')}}/{{ Auth::user()->company->logo }}" alt="company logo" width="300px" class="mt-3 shadow img-fluid">

                @endif

        <div class="card-body">
            <h5 class="card-title text-center">{{ $company->company_name }}</h5>
            {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
            <div class="mx-auto mt-4 text-center">
                <a href="{{route('company.index',[$company->id,$company->slug])}}" class="btn btn-primary">view company</a>
            </div>

            {{-- card body ends here --}}
        </div>

  {{-- card ends here --}}
</div>

            {{-- col ends here --}}
        </div>

        @endforeach
        
            <div class="mx-auto mb-5 mt-3">
                {{ $companies->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}
            </div>
        {{-- row ends here --}}
    </div>
</div>

<style>
    .companies{
        margin-top: 200px;
    }
</style>

@endsection