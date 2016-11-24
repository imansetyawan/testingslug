@include('blog.headerblog')
@include('blog.navbarblog')
<div class="main-content">
    <div class="container">
        <div class="row">
                   
            <div class="col-md-8">
                <div class="leave-comment mr0"><!--leave comment-->
                    <!-- <div id="googleMap" style="width:100%; height:380px; margin-bottom: 40px"></div> -->
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus aliquam deserunt esse
                        fugit iste magnam, neque nesciunt nihil possimus ratione repellendus veniam vero. Accusamus
                        deleniti deserunt esse illo recusandae.</p> -->

                    <h3 class="text-uppercase">Send massage</h3>
                    <br>

                    <form  class="form-horizontal contact-form" role="form" method="post" action="{{ route('post_blog_contact') }}">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="email {{ $errors->has('name') ? 'has-error' : ''}}">
                                <input type="text" class="form-control" name="name"
                                       placeholder="Name">
                                {{($errors->has('name')) ? $errors->first('name') : ''}}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="email {{ $errors->has('email') ? 'has-error' : ''}}">
                                <input type="email" class="form-control" name="email"
                                       placeholder="Email">
                                {{($errors->has('email')) ? $errors->first('email') : ''}}
                            </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="subject {{ $errors->has('subject') ? 'has-error' : ''}}">
                                <input type="text" class="form-control" name="subject"
                                       placeholder="Subject">
                                {{($errors->has('subject')) ? $errors->first('subject') : ''}}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="pesan {{ $errors->has('pesan') ? 'has-error' : ''}}">
                                        <textarea class="form-control" rows="6" name="pesan"
                                                  placeholder="Message" required></textarea>
                                {{($errors->has('pesan')) ? $errors->first('pesan') : ''}}
                                </div>
                            </div>
                        </div>

                         <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <button id="sww" type="submit" name="submit" class="btn send-btn">send massage</button>

                    </form>
                </div><!--end leave comment-->
            </div>
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