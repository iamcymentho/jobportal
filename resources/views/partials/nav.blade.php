<div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    
    <div class="site-navbar-wrap js-site-navbar bg-white">
      
      <div class="container">
        <div class="site-navbar bg-light mb-5">
          <div class="py-1">
            <div class="row align-items-center">
              <div class="col-2 section-heading">
                <h2 class="mb-0 site-logo"><a href="/">Recruiters<strong class="font-weight-bold">Hub</strong> </a></h2>
              </div>
              <div class="col-10">
                <nav class="site-navigation text-right" role="navigation">
                  <div class="container">
                    <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                    <ul class="site-menu js-clone-nav d-none d-lg-block">

                      <li><a href="/register">For job seeker</a></li>

                      {{-- <li class="has-children"> --}}
                        <li class="">
                        <a href="{{ route('employer.register') }}">For Employers</a>
                        {{-- <ul class="dropdown arrow-top">
                          <li><a href="category.html">Category</a></li>
                          <li><a href="#">Browse Candidates</a></li>
                          <li><a href="new-post.html">Post a Job</a></li>
                          <li><a href="#">Employeer Profile</a></li>
                          <li class="has-children">
                            <a href="#">More Links</a>
                            <ul class="dropdown">
                              <li><a href="#">Browse Candidates</a></li>
                              <li><a href="#">Post a Job</a></li>
                              <li><a href="#">Employeer Profile</a></li>
                            </ul>
                          </li>

                        </ul> --}}
                      </li>
                      <li><a href="contact.html">Contact</a></li>

                      @if (!Auth::check())

                      <li>
                        <a href="/login"><span class="bg-primary text-white py-3 px-4 rounded btn-lg"><span class="icon-plus mr-3"></span>LOGIN HERE</span></a>
                    
                    </li>
                    @else

                    <li>
                         <a class="bg-primary text-white py-3 px-4 rounded btn-lg" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                    </li>

                     @endif

                    </ul>

                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>