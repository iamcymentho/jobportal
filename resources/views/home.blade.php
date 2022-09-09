
@extends('layouts.app')


@section('content')
<div class="container mybody">
    <div class="row justify-content-center">
        <div class="col-md-10">

            @if (Auth::user()->user_type == 'seeker')
                
             @foreach ($jobs as $job )
            <div class="card mt-3 mb-3">
                <div class="card-header bg-dark text-white"><b>{{$job->title }}</b><br>
                <div class="mt-2">
                    <small class="badge bg-secondary p-1 "><b>{{ $job->position }}</b></small>
                </div>
                
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ $job->description }}

                </div>

                <div class="card-footer">
                    <span><a href="" class="btn btn-secondary btn-sm">Goodluck</a></span>

                        <span class="applicationtime"> {{ $job->created_at->diffForHumans() }}</span>
                    
                </div>
              
              

            </div>
              @endforeach
              @endif
        </div>

         {{-- {{ $jobs->appends(Illuminate\Support\Facades\Request::except('page'))->links() }} --}}
    </div>
</div>

<style>
    .mybody{
        background-color: #f4
    }

    .applicationtime{
        margin-left: 840px;
    }
</style>

@endsection
