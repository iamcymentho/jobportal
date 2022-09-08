
@extends('layouts.app')


@section('content')
<div class="container mybody">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

               
             
                    
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   

                    {{ __('You are logged in!') }}


                    dhbeyuhfurhuer
                </div>
              
                {{-- @endforeach --}}

            </div>
        </div>
    </div>
</div>

<style>
    .mybody{
        background-color: #f4
    }
</style>

@endsection
