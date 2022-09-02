@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row mt-5">

        <div class="col-md-4">
            <div>
               @include('admin.left-menu')
            </div>
        </div>
       <div class="col-md-8">

        @if (Session::has('message'))
            
       <div class="alert alert-success alert-dismissible"><b>{{ Session::get('message') }}</b></div>
        @endif



            <table class="table  table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Content</th>
      <th scope="col">Status</th>
      <th scope="col">Publish date</th>

      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>

    @foreach ($posts as $post)
        
    
    <tr>
      
      <td><img src="{{ asset('storage/'.$post->image) }}" alt="images" width="60px;" class="img-fluid"></td>
      <td>{{ $post->title }}</td>
      <td>{{ str::limit($post->content, 20) }}</td>

       <td>
        @if ($post->status == '0')
           <a href="" class="badge bg-primary mybadge"><span>Draft</span></a>
         @else
            <a href="" class="badge bg-success mybadge"><span>Live</span></a> 
        @endif

       </td>

        <td>{{ $post->created_at->diffForHumans() }}</td>
       <td>

            <a href="{{ route('post.restore', [$post->id]) }}">
                
                <button class="btn btn-warning text-white"><b>Restore</b></button>
            </a>
        



       </td>

    </tr>
    
   @endforeach
  </tbody>
</table>

                    <div class="text-center mt-5">
                        {{ $posts->appends(Illuminate\Support\Facades\Request::except('page'))->links() }} 
                    </div>
        {{-- col ends here --}}
       </div>

        {{-- row ends here --}}
    </div>


    <style>
        a{
            text-decoration: none;
        }

        .mybadge:hover{
            color:white;
        }
    </style>

    {{-- container ends here --}}
</div>

@endsection