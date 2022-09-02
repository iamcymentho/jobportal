 @php
    use Illuminate\Support\Str;
@endphp
 
 <div class="site-section block-15">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2>Recent Blog</h2>
          </div>
        </div>


        <div class="nonloop-block-15 owl-carousel">
          
            @foreach ( $posts as  $post)
              
            
            <div class="media-with-text">
              <div class="img-border-sm mb-4">
                <a href="{{ route('post.show', [$post->id, $post->slug]) }}" class="image-play">
                  <img src="{{ asset('storage/'.$post->image) }}" alt="images" class="img-fluid" style="width:300px;">
                 </a>
              </div>
              <h2 class="heading mb-0 h5"><a href="{{ route('post.show', [$post->id, $post->slug]) }}">{{ $post->title }}</a></h2>
              <span class="mb-3 d-block post-date">
                
               
                
                {{ $post->created_at->diffForHumans() }} &bullet; By <a href="#">Admin</a></span>
              <p>{{ str::limit($post->content, 50) }}</p>
            </div>

            @endforeach

            {{-- job display --}}
        </div>

        <div class="row">
          
        </div>
      </div>
    </div>
    