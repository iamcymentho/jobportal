@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow mt-5">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   
                     <table class="table table-striped table-bordered table-hover ">
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
                    <td>
                        
                         @if (empty(Auth::user()->company->logo))
                    
                <img src="{{ asset('avatar/man.jpg') }}" alt="profile picture" width="80px" class="mt-3 shadow">

                @else

                <img src="{{ asset('uploads/logo')}}/{{ Auth::user()->company->logo }}" alt="company logo" width="80px" class="mt-3 shadow img-fluid">

                @endif
                    
                    
                    </td>

                    <td>Position: {{ $job->position }}
                        <br><br>
                        <i class="fa fa-solid fa-clock"></i>&nbsp; {{ $job->type }}

                    </td>

                    <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; {{ $job->address }}</td>
                    <td><i class=" fa fa-solid fa-globe"></i>&nbsp; {{ $job->created_at->diffForHumans() }}</td>
                    
                 
                    <td>

                        <a href="{{ route('editjob', [$job->id]) }}">

                            <button class="btn btn-secondary">Edit</button>
                        </a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection



