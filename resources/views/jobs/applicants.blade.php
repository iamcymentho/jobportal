@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

           
            <div class="card mb-4 shadow">
                 {{-- @foreach ($applicants as $applicant ) --}}
                {{-- <div class="card-header mt-3 bg-dark text-white"><a href="{{ route('jobs.show', [$appliedjob->id, $appliedjob->slug]) }}" class="mylink">{{ $appliedjob->position}}</a></div>
                 --}}

                 <div class="card-header">hbfuyfry</div>

                 {{ dd($applicants) }}
                
            {{-- <h1>{{ $appliedjob->name }}</h1> --}}

            {{-- {{ dd($appliedjob) }} --}}

            <div class="card-body">
                
                    hdbchfbf
               
                
                {{-- <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                        <th><b>NAME</b></th>
                        <th><b>EMAIL</b></th>
                        <th><b>ADDRESS</b></th>
                        <th><b>DESCRIPTION</b></th>
                         <th><b>ROLES</b></th>
                        <th><b>JOB-TYPE</b></th>
                        <th><b>RESUME</b></th>
                        <th><b>COVER LETTER</b></th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>{{ $appliedjob->name }}</td>
                            <td>{{ $appliedjob->email }}</td>
                            <td>{{ $appliedjob->address }}</td>
                            <td>{{ $appliedjob->description }}</td>
                             <td>{{ $appliedjob->roles }}</td>
                            <td>{{ $appliedjob->type}}</td>
                            <td><a href="{{ Storage::url($appliedjob->resume) }}">Resume</a></td>
                            <td><a href="{{ Storage::url($appliedjob->cover_letter) }}">Cover Letter</a></td>
                        </tr>
                    </tbody>

                </table> --}}
                {{-- card body ends here --}}
            </div>
           
                

                 {{-- @endforeach  --}}
                {{-- card ends here --}}
            </div>
        
           
           
                
           

        </div>
    </div>
</div>

<style>
    .mylink{
        text-decoration: none;
        color: white;
    }

     .mylink:hover{
        
        color: red;
        background-color: white
    }
</style>
@endsection
