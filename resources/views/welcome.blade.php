@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <h3>Recent Jobs</h3>
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

    <div class="w-100 mt-4">
        <a href="{{ route('alljobs') }}" class="btn btn-success btn-lg w-100">Browse all jobs</a>
            
        
    </div>

    <div class="mt-4 text-center">
        <h3>FEATURED COMPANIES</h3>
    </div>

    {{-- container ends here --}}
</div>

<div class="container">

    <div class="row">

        @foreach ($companies as $company)
            
        
        <div class="col-md-3">

            <div class="card shadow mt-4" style="width: 18rem;">
  <img src="{{ asset('uploads/logo') }}/{{ $company->logo }}" class="card-img-top img-fluid " alt="company logo">
  <div class="card-body">
    <h5 class="card-title"><b>{{ $company->company_name }}</b></h5>
    <p class="card-text">{{str::limit($company->description, 50) }}</p>
    <a href="{{ route('company.index', [$company->id, $company->slug]) }}" class="btn btn-outline-primary">Visit company</a>
  </div>

  {{-- card ends here --}}
</div>

            {{-- col ends here --}}
        </div>
        @endforeach

        {{-- row ends here --}}
    </div>

    {{-- another container ends here --}}
</div>
@endsection

<style>
    .fa{
        color: #4183D7;
    }
</style>
