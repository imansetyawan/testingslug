<body>
<nav class="navbar main-menu navbar-default">
    <div class="container">
        <div class="menu-content">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href=""><img src="{{ url('asset/dist2/images/logo.png')}}" alt=""></a>
            </div>


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav text-uppercase">
                    <li><a href="{{ route('get_blog') }}">Home </a>
                    </li>
                    <li class="menu-item-has-children"><a data-toggle="dropdown" class="dropdown-toggle" href="#">Kategori
                        <i class="fa fa-angle-down"></i></a>
                        <ul class="sub-menu">
                            @foreach($kategoris as $kategori)
                            <li><a href="{{ route('get_kategori_artikel', ['slug' => $kategori->slug])}}">{{$kategori->namakategori}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{ route('get_blog_contact') }}">CONTACT</a></li>
                </ul>
                <div class="i_con" style="margin-right: 13%;">
                    <a href="#"><i class="active fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-heart"></i></a>

                    <div class="top-search">
                        <form  method="GET" action="{{route('get_blog_seacrh')}}">
                            <div>
                            <input type="text" placeholder="Search and hit enter..." name="search"  style="margin-top: 16px; margin-left: 91%;">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.navbar-collapse -->


            <!-- <div class="show-search">
                <form role="search" method="get" id="searchform" action="#">
                    <div>
                       <input type="text" placeholder="Search and hit enter..." name="s" id="s" style="margin-top: 16px; margin-left: 91%;">
                    </div>
                </form>
            </div> -->
        </div>
    </div>
    <!-- /.container-fluid -->
</nav>