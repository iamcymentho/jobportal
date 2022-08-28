@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @foreach ($appliedjobs as $appliedjob )
            <div class="card mb-4 shadow">
                
                <div class="card-header mt-3 bg-dark text-white"><a href="{{ route('jobs.show', [$appliedjob->id, $appliedjob->slug]) }}" class="mylink">{{ $appliedjob->position}}</a></div>
                
                
            {{-- <h1>{{ $appliedjob->name }}</h1> --}}

            {{-- {{ dd($appliedjob) }} --}}

            <div class="card-body">
                
                    
               
                
                <table class="table table-hover table-striped">
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

                </table>
                {{-- card body ends here --}}
            </div>
           
                

                 
                {{-- card ends here --}}
            </div>
        
            @endforeach
           
                
           

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
