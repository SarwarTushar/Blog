<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">

    <span class="brand-text font-weight-light">Sports Blog</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

      <div class="info">
        <a href="#" class="d-block"></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->

        <li class="nav-item ">
          <a href="{{route('post.create')}}" class="nav-link {{Request::is('post/create') ? 'active' : ''}}">
            <i class="fas fa-book-open"></i>
            <p>
              Post Create
            </p>
          </a>
        </li>
        <li class="nav-item ">
            <a href="{{route('tag.index')}}" class="nav-link {{Request::is('tag') || Request::is('tag/create') || Request::is('tag/create*') ? 'active' : ''}}">
              <i class="fas fa-book-open"></i>
              <p>
                Tag
              </p>
            </a>
        </li>
        <li class="nav-item ">
          <a href="{{route('mypost.index')}}" class="nav-link {{Request::is('mypost') ? 'active' : ''}}">
            <i class="fas fa-book-open"></i>
            <p>
              My Posts
            </p>
          </a>
      </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
