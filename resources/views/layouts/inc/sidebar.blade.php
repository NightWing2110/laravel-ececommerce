<div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
      Creative Tim
    </a></div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }} ">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('categories') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.categories.index') }}">
          <i class="material-icons">category</i>
          <p>Category</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('add-category') ? 'active' : '' }} ">
        <a class="nav-link" href="{{ route('admin.categories.add') }}">
          <i class="material-icons">category</i>
          <p>Add Category</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('products') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.products.index') }}">
          <i class="material-icons">products</i>
          <p>Product</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('add-product') ? 'active' : '' }} ">
        <a class="nav-link" href="{{ route('admin.products.add') }}">
          <i class="material-icons">products</i>
          <p>Add Product</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('orders') ? 'active' : '' }} ">
        <a class="nav-link" href="{{ url('orders') }}">
          <i class="material-icons">content_paste</i>
          <p>Order</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('users') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('users') }}">
          <i class="material-icons">person</i>
          <p>User</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('blogs') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('blogs') }}">
          <i class="material-icons">pages</i>
          <p>Blog</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('add-blog') ? 'active' : '' }} ">
        <a class="nav-link" href="{{ route('admin.blog.create') }}">
          <i class="material-icons">pages</i>
          <p>Add Blog</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('contacts') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('contacts') }}">
          <i class="material-icons">Contact</i>
          <p>Contact</p>
        </a>
      </li>
      <!-- <li class="nav-item active-pro ">
              <a class="nav-link" href="./upgrade.html">
                  <i class="material-icons">unarchive</i>
                  <p>Upgrade to PRO</p>
              </a>
          </li> -->
    </ul>
  </div>
</div>