 <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <!--<li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#categories" aria-expanded="false" aria-controls="categories">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Categories</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="categories">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('category') }}">Add Category</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">View Category</a></li>
              </ul>
            </div>
          </li>-->
          <li class="nav-item">
            <a class="nav-link" href="{{ url('category') }}" >
              <span class="mdi mdi-apps-box mt-1" style="height: 30px; width: 30px;"></span>
              <span class="menu-title">Categories</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('brands') }}">
              <span class="mdi mdi-watermark mt-1" style="height: 30px; width: 30px;"></span>
              <span class="menu-title">Brands</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Products</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('products/create') }}">Add Product</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('products') }}">View Product</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('colors') }}">
              <span class="mdi mdi-select-color mt-1" style="height: 30px; width: 30px;"></span>
              <span class="menu-title">Colors</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('sliders') }}">
              <span class="mdi mdi-view-carousel mt-1" style="height: 30px; width: 30px;"></span>
              <span class="menu-title">Home Slider</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('ordersAdmin') }}">
              <i class="mdi mdi-point-of-sale"></i>&nbsp;&nbsp;&nbsp;&nbsp;
              <span class="menu-title">Orders</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('site-settings') }}">
                <i class="mdi mdi-sale menu-icon"></i>
              <span class="menu-title">Site Settings</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
