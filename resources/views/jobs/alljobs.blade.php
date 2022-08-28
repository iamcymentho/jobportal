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

        
       {{ $jobs->links() }}
    </div>

   
    
    
    {{-- container ends here --}}
</div>


@endsection

<style>
    .fa{
        color: #4183D7;
    }
</style>
