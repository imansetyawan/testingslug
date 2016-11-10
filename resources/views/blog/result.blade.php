@include('blog.headerblog')
@include('blog.navbarblog')
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    @if (count($hasil))
                    @foreach ($hasil as $data)
                    <div class="col-md-6">
                        <article class="post post-grid">
                            <div class="post-thumb">
                                <a href="{{ route('single_artikel', ['slug' => $data->slug])  }}"><img src="{{asset('image/thumb_'.$data->image)}}" alt=""></a>

                                <a href="{{ route('single_artikel', ['slug' => $data->slug])  }}" class="post-thumb-overlay text-center">
                                    <div class="text-uppercase text-center">View Post</div>
                                </a>
                            </div>
                            <div class="post-content">
                                <header class="entry-header text-center text-uppercase">
                                    <h6><a href="{{ route('get_kategori_artikel', ['slug' => $data->kategori->slug])}}"> {{$data->kategori->namakategori}}</a></h6>

                                    <h1 class="entry-title"><a href="{{route('single_artikel', ['slug' => $data->slug])}}">{{$data->judulartikel}}</a></h1>
                                </header>
                                
                            </div>
                        </article>
                    </div>
                      @endforeach
                </div>
                <ul class="pagination">
                    {{ $hasil->render() }}
                </ul>
            </div>
            @else
               <div class="card-panel red darken-3 white-text">Oops.. Data Tidak Ditemukan</div>
            @endif
            <div class="col-md-4" data-sticky_column>
                <div class="primary-sidebar">
                    @include('blog.indexkategoriblog')
                    <aside class="widget news-letter">
                        <h3 class="widget-title text-uppercase text-center">Get Newsletter</h3>

                        <form method="post" action="{{route('post_insert_subscriber')}}">
                            <input type="email" name="email" placeholder="Your email address">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="submit" value="Subscribe Now"
                                   class="text-uppercase text-center btn btn-subscribe">
                        </form>

                    </aside>
                    <aside class="widget">
                        <h3 class="widget-title text-uppercase text-center">Popular Posts</h3>
                        @foreach ($mostpop as $mostpop)
                        <div class="popular-post">
                            <a href="#" class="popular-img"><img width="298" height="191" src="{{asset('image/thumb_'.$mostpop->image)}}" alt="">
                                <div class="p-overlay"></div>
                            </a>
                            <div class="p-content">
                                <a href="{{ route('single_artikel', ['slug' => $mostpop->slug])  }}" class="text-uppercase">{{$mostpop->judulartikel}}</a>
                               <span><i class="fa fa-eye"></i> {{$mostpop->pageview}}</span>
                            </div>
                        </div>
                        @endforeach
                    </aside>
                    
                    <aside class="widget pos-padding">
                        <h3 class="widget-title text-uppercase text-center">Recent Posts</h3>

                        @foreach ($recents as $recent)
                        <div class="thumb-latest-posts">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#" class="popular-img"><img width="107" height="76" src="{{asset('image/thumb_'.$recent->image)}}" alt="">

                                        <div class="p-overlay"></div>
                                    </a>
                                </div>
                                <div class="p-content">
                                    <a href="{{ route('single_artikel', ['slug' => $recent->slug])  }}" class="text-uppercase">{{$recent->judulartikel}}</a>
                                    <span class="p-date">{{ date('d F Y', strtotime($recent->created_at))}}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </aside>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@include ('blog.footerblog')