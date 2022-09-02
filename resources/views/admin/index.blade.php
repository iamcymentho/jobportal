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
      <td>{{ str::limit($post->title, 10) }}</td>
      <td>{{ str::limit($post->content, 20) }}</td>

       <td>
        @if ($post->status == '0')
           <a href="{{ route('post.toggle', [$post->id]) }}" class="badge bg-primary mybadge"><span>Draft</span></a>
         @else
            <a href="{{ route('post.toggle', [$post->id]) }}" class="badge bg-success mybadge"><span>Live</span></a> 
        @endif

       </td>

        <td>{{ $post->created_at->diffForHumans() }}</td>
       <td>

            <a href="{{ route('post.edit', [$post->id]) }}">
                
                <button class="btn btn-primary"><b>Edit</b></button>
            </a>
        {{-- <button class="btn btn-danger">Delete</button> --}}


        <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $post->id }}">
  <b>Delete</b>
</button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop{{ $post->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="staticBackdropLabel">Delete post?</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this post?
            </div>
            <form action="{{ route('post.delete') }}" method="POST">
                @csrf
            
            <div class="modal-footer">
                {{-- passing the post ID about to be deleted as hidden . That way it wont be passed in the destroy method in the DashboardController --}}

                <input type="hidden" name="id" value="{{ $post->id }}">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>

                {{-- form ends here --}}
            </form>
            </div>
        </div>

        {{-- modal ends here --}}
        </div>



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