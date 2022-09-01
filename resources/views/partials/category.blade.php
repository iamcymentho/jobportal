 <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2 class="mb-5">Popular Categories</h2>
          </div>
        </div>
        <div class="row">

            @foreach ($categories as $category )
                
          <div class="col-sm-6 col-md-4 col-lg-3 mb-3" data-aos="fade-up" data-aos-delay="100">
            <a href="{{ route('category.index', [$category->id]) }}" class="h-100 feature-item">
          <span>  <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M4 3c-1.11 0-2 .89-2 2v10a2 2 0 0 0 2 2h8v5l3-3l3 3v-5h2a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H4m8 2l3 2l3-2v3.5l3 1.5l-3 1.5V15l-3-2l-3 2v-3.5L9 10l3-1.5V5M4 5h5v2H4V5m0 4h3v2H4V9m0 4h5v2H4v-2Z"/></svg> </span>
             
             <span class="d-block icon mb-2 text-primary"></span>
              <h2 class="mb-2"><b><i>{{ $category->name }}</i> </b></h2>
              <span class="counting"><b>{{ $category->jobs->count() }}</b></span>
            </a>
          </div>

           @endforeach
        </div>

        {{-- container ends here --}}
      </div>


      <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    </div>
