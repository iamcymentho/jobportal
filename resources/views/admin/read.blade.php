@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.main')
@section('content')
   <div class="album text-muted">
     <div class="container">
      
       <div class="row" id="app">

          <div class="title" style="margin-top: 170px;">
                <h2 class="text-muted mb-0">{{$post->title}} </h2> 

               <small  class="badge bg-primary text-white p-2 mt-2">Published By : Admin &nbsp; {{ date('Y-m-d'), strtotime($post->created_at) }}</small> 
            
          </div>

           

      <img src="{{ asset('storage/'.$post->image) }}" style="width: 100%;" class="mt-4 mb-5 shadow">

          <div class="col-lg-12 shadow m-2 mb-5">

            <div class="p-4 mb-8 bg-white mt-5  ">
              <!-- icon-book mr-3-->
              <h3 class="h5 text-black mb-4">
                
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 15 15"><path fill="green" d="M14 1v12H1V8.72a.5.5 0 0 1 .17-.37l3-3.22a.5.5 0 0 1 .83.38v3l3.16-3.37a.5.5 0 0 1 .84.37V11h3V1h2z"/></svg>
                
                Description 
                
               </h3>

              <p> {{$post->content}}.</p>
              
            </div>

          </div>

            

             

           
           
           
            
{{-- recommendations section  go here --}}



{{-- container ends here --}} 
     </div> 
   </div>
   </div>
@endsection
