@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row mt-5">
        <div class="col-md-4">

           @include('admin.left-menu')

            {{-- col ends here --}}
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                             <input type="text" class="form-control" name="title" placeholder="enter title">
                        </div>

                         <div class="form-group mt-3">
                            <label for="content" class="form-label">Description</label>
                             <textarea name="content" id="content" cols="30" rows="10" placeholder="Enter description here" class="form-control"></textarea>
                        </div>

                        <div class="form-group mt-3">
                            <label for="image" class="form-label">Image</label>
                             <input type="file" class="form-control" name="image" id="image">
                        </div>

                        <div class="form-group mt-3">
                            <label for="status" class="form-label">Status</label>
                             <select name="status" id="status" class="form-select">

                                <option value="">select status</option>
                                <option value="1">Live</option>
                                <option value="0">Draft</option>
                             </select>
                        </div>

                        <div class=" mt-3">
                            <button type="submit" class="btn btn-primary btn-lg">Make your Post</button>
                        </div>
                    </form>

                    {{-- card header ends here --}}
                </div>
                {{-- card ends here --}}
            </div>

            {{-- col ends here --}}
        </div>

        {{-- row ends here --}}
    </div>

    {{-- container ends here --}}
</div>

@endsection