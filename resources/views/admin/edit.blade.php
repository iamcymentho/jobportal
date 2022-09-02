@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row mt-5">
        <div class="col-md-4">

           @include('admin.left-menu')

            {{-- col ends here --}}
        </div>

        <div class="col-md-8">

             @if (Session::has('message'))
            
       <div class="alert alert-success alert-dismissible"><b>{{ Session::get('message') }}</b></div>
        @endif


            <div class="card">
                <div class="card-header text-center bg-dark text-white">

                    <h4>Edit post</h4>
                    {{-- card header ends here --}}
                </div>

                <div class="card-body">

                    <form action="{{ route('post.update', [$post->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                             <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="enter title " value="{{ $post->title }}">

                               @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                         <div class="form-group mt-3">
                            <label for="content" class="form-label">Description</label>
                             <textarea name="content" id="content" cols="30" rows="10" placeholder="Enter description here" class="form-control @error('title') is-invalid @enderror">{{ $post->content }}</textarea>

                               @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="image" class="form-label">Image</label>
                             <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" value="">

                             {{-- getting the image --}}
                             <img src="{{ asset('storage/'.$post->image) }}" alt="" class="img-fluid mt-1 editimage" >

                             @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="status" class="form-label">Status</label>
                             <select name="status" id="status" class="form-select">

                               <option value="0"{{ $post->status == '0'?'selected':'' }}>Draft</option>

                                <option value="1"{{ $post->status == '1'?'selected':'' }}>Live</option>
                             </select>
                        </div>

                        <div class=" mt-3">
                            <button type="submit" class="btn btn-primary btn-lg">Update post</button>
                        </div>
                    </form>

                    {{-- card body ends here --}}
                </div>
                {{-- card ends here --}}
            </div>

            {{-- col ends here --}}
        </div>

        {{-- row ends here --}}
    </div>

    <style>
        .editimage{
            width:100%;
        }
    </style>

    {{-- container ends here --}}
</div>

@endsection