@php
    use Illuminate\Support\Str;
@endphp

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>RecruitersHub &mdash; Your dream job is a click away</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('partials.head')

  </head>
  <body>
  
  @include('partials.nav')
  
   @include('partials.hero')

   @include('partials.category')

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
            <div class="section-heading text-center">
                <h2 class="mb-5 h3">Recent Jobs</h2>
            </div>
            <div class="rounded border jobs-wrap shadow">

                @foreach ($jobs as $job )   

              <a href="{{ route('jobs.show', [$job->id, $job->slug]) }}" class="job-item d-block d-md-flex align-items-center  border-bottom fulltime">
                
                <div class="company-logo blank-logo text-center text-md-left pl-3">
                  <img src="{{ asset('uploads/logo') }}/{{ $job->company->logo }}" alt="Image" class="img-fluid mx-auto">
                </div>
                <div class="job-details h-100">
                  <div class="p-3 align-self-center">
                    <h3>{{ $job->position }}</h3>
                    <div class="d-block d-lg-flex">
                      <div class="mr-3"><span class="icon-suitcase mr-1"></span>{{ $job->company->company_name }}</div>
                      <div class="mr-3"><span class="icon-room mr-1"></span> {{ str::limit($job->address, 20) }}</div>
                      <div><span class="icon-money mr-1"></span> {{ $job->salary }}</div>
                    </div>
                  </div>
                </div>
                <div class="job-category align-self-center">

                    {{-- changing the color of the button based on the job type --}}

                    @if($job->type == 'full-time')

                  <div class="p-3">
                    <span class="text-danger p-2 rounded border border-danger">{{ $job->type }}</span>
                  </div>

                  @elseif($job->type == 'part-time')

                   <div class="p-3">
                    <span class="text-info p-2 rounded border border-info">{{ $job->type }}</span>
                  </div>

                  @else
                   <div class="p-3">
                    <span class="text-warning p-2 rounded border border-warning">{{ $job->type }}</span>
                  </div>

                  @endif
                </div>  
              </a>

              
              @endforeach

            </div>

            <div class="col-md-12 text-center mt-5">
              <a href="{{ route('alljobs') }}" class="btn btn-primary rounded py-3 px-5"><span class="icon-plus-circle"></span> Show More Jobs</a>
            </div>
          </div>
          
        </div>
      </div>
    </div>

   @include('partials.testimonial')
    

    <div class="site-section site-block-feature bg-light">
      <div class="container">
        
        <div class="text-center mb-5 section-heading">
          <h2>Why Choose Us</h2>
        </div>

        <div class="d-block d-md-flex border-bottom">
          <div class="text-center p-4 item border-right" data-aos="fade">
            <span class="flaticon-worker display-3 mb-3 d-block text-primary"></span>
            <h2 class="h4">More Jobs Every Day</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
            <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
          </div>
          <div class="text-center p-4 item" data-aos="fade">
            <span class="flaticon-wrench display-3 mb-3 d-block text-primary"></span>
            <h2 class="h4">Creative Jobs</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
            <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
          </div>
        </div>
        <div class="d-block d-md-flex">
          <div class="text-center p-4 item border-right" data-aos="fade">
            <span class="flaticon-stethoscope display-3 mb-3 d-block text-primary"></span>
            <h2 class="h4">Healthcare</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
            <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
          </div>
          <div class="text-center p-4 item" data-aos="fade">
            <span class="flaticon-calculator display-3 mb-3 d-block text-primary"></span>
            <h2 class="h4">Finance &amp; Accounting</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
            <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
          </div>
        </div>
      </div>
    </div>


    @include('partials.blog')

    
   @include('partials.footer')
  </body>
</html>