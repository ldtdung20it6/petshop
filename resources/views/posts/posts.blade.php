<div class="container-fluid ">
                  <div class="w-90 ms-auto me-auto">
                  <div class="row ">
                      @foreach($posts as $key => $post)
                    <div class="col-md-4">
                        <div><a href="{{$post->link}}"><img class="img-banner" src="{{$post->thumb}}" alt="{{$post->name}}"></a></div>
                        <div><a class="text-decoration-none fs-14px fs-design" href="">{{$post->name}}</a></div>
                        <div class="date-time pt-2"><i class="far fa-clock"></i>{{$post->updated_at}}</div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
