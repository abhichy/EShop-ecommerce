<ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-table"></i>
            <span>Products</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="productsDropdown">
          <a class="dropdown-item" href="{{route('add-product')}}">Add a Product</a>
            <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('manage-product')}}">All Products</a>
          </div>
        </li>


          <li class="nav-item">
        <a class="nav-link" href="{{route('manage-heading')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Heading</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin-manage-order')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Orders</span></a>
    </li>

        <li class="nav-item">
        <a class="nav-link" href="{{route('manage-type')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Types</span>
          </a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="{{route('manage-category')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Category</span>
          </a>
        </li>
         <li class="nav-item">
        <a class="nav-link" href="{{route('manage-brand')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Brands</span>
          </a>
        </li>


        <li class="nav-item">
        <a class="nav-link" href="{{route('vendor-manage')}}">
              <i class="fas fa-fw fa-table"></i>
          <span> Vendor Management </span>
            </a>
          </li>

        <li class="nav-item">
        <a class="nav-link" href="{{route('client-manage')}}">
              <i class="fas fa-fw fa-table"></i>
          <span> Client Management </span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('vendor-create')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>Create Vendor</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('client-create')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>Create Client</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('purchase-create')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>Purchase</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('sales-create')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>Sales</span></a>
        </li>


    </ul>




