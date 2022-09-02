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

            <table class="table  table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
        {{-- col ends here --}}
       </div>

        {{-- row ends here --}}
    </div>

    {{-- container ends here --}}
</div>

@endsection