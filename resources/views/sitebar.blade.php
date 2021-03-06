<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">

        <li class="">
          <a href="{{ route('admin_home') }}">
            <i class="fa fa-dashboard"></i> <span> Home</span>
          </a>
        </li>
        @if(Auth::user()->hasRole('admin'))
        <li class="">
          <a href="{{action('InfoController@index')}}">
            <i class="fa fa-info"></i>
            <span> Info</span>
          </a>
        </li>

        <li class="treeview">
          <a href="{{ route('index_user') }}">
            <i class="fa fa-user"></i>
            <span> User</span>
          </a>
        </li>
        @endif
        @if(Auth::user()->hasRole('author') || Auth::user()->hasRole('admin'))
        <li class="treeview">
          <a href="{{ route('index_subscriber') }}">
            <i class="fa fa-users"></i>
            <span> Subscriber</span>
          </a>
        </li>

        <li class="treeview">
          <a href="{{ route('index_message') }}">
            <i class="fa fa-envelope"></i>
            <span> Message</span>
          </a>
        </li>

        <li class="">
          <a href="{{ route('index_kategori') }}">
            <i class="fa fa-files-o"></i> <span> Kategori</span>
          </a>
        </li>
        @endif
        <li>
          <a href="{{ route('index_artikel') }}">
            <i class="fa fa-th"></i> <span> Artikel</span>
          </a>
        </li>

        <li class="">
          <a href="{{ route('index_profil') }}">
            <i class="fa fa-files-o"></i>
            <span> Profil</span>
          </a>
        </li>




      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
